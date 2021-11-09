<?php
namespace App\Http\Controllers\Marketer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Validations\MarketerRequest;
use App\Mail\AdminResetPassword;
use App\Models\Marketer;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Mail;

class MarketerAuthenticated extends Controller {

	public function login_page() {
		return view('admin.marketer.login', ['title' => trans('admin.login_page')]);
	}

	public function lock_screen() {
		$marketer = Marketer::where('email', request('email'))->first();
		marketer()->logout();
		if (is_null($marketer) || empty($marketer)) {
			return redirect(aurl('marketer/login'));
		}
		return view('admin.lock_screen', [
			'title' => trans('admin.lock_screen'),
			'admin' => $marketer,
		]);
	}

	public function login_post() {
		$rememberme = request('rememberme') == 1 ? true : false;
		if (marketer()->attempt(['email' => request('email'), 'password' => request('password')], $rememberme)) {
			return redirect(url('marketer'));
		} else {
			session()->flash('error', trans('admin.error_loggedin'));
			return back();
		}
	}

	public function logout() {
		marketer()->logout();
		return redirect(url('marketer/login'));
	}

	public function reset_password_change($tokenstr) {

		$this->validate(request(),
			[
				'password' => 'required|min:6|confirmed',
				'password_confirmation' => 'required',
				'email' => 'required|email',
			], [], [
				'password' => trans('admin.password'),
				'password_confirmation' => trans('admin.password_confirmation'),
			]);
		$token = DB::table('password_resets')->where('token', $tokenstr)->where('created_at', '>', Carbon::now()->subHours(2))->first();

		if (!empty($token)) {
			$marketer = Marketer::where('email', $token->email)->update(['password' => bcrypt(request('password'))]);
			session()->flash('success', trans('admin.password_is_changed'));
			if (request()->has('andlogin')) {
				auth()->guard('admin')->attempt(['email' => $token->email, 'password' => request('password')]);
				return redirect(url('marketer/'));
			}
			DB::table('password_resets')->where('token', $tokenstr)->delete();
			return redirect(url('marketer/login'));
		} else {
			session()->flash('error', trans('admin.time_token_ended'));
			return redirect(url('marketer/login'));
		}
	}

	public function reset_password_final($token) {

		$token = DB::table('password_resets')->where('token', $token)->where('created_at', '>', Carbon::now()->subHours(2))->first();

		empty($token) ? session()->flash('error', trans('admin.time_token_ended')) : '';

		return !empty($token) ? view('admin.reset_password', ['token' => $token]) :
		redirect(url('marketer/login'));

	}
	public function reset_password() {
		$user = Marketer::where('email', request('email'))->first();
		if (!empty($user)) {
			$token = app('auth.password.broker')->createToken($user);
			$data = DB::table('password_resets')->insert([
				'email' => request('email'),
				'token' => $token,
				'created_at' => Carbon::now(),
			]);
			$sendmail = Mail::to(request('email'))->send(new AdminResetPassword([
				'url' => url('marketer/password/reset/' . $token),
				'data' => $user,
			]));
			session()->flash('success', trans('admin.reset_link_sent'));
			return redirect(url('marketer/forgot/password'));
		} else {
			session()->flash('error', trans('admin.email_not_found'));
			return redirect(url('marketer/forgot/password'));
		}
	}

	public function account() {
		return view('admin.account', ['title' => trans('admin.account')]);
	}

	public function account_post() {

		$rules = [
			'name' => 'required',
			'email' => 'required|email|unique:admins,email,' . marketer()->user()->id,
			'password' => 'sometimes|nullable|confirmed',
			'password_confirmation' => '',
			'photo_profile' => 'sometimes|nullable|' . it()->image(),
		];
		$data = $this->validate(request(), $rules, [], [
			'name' => trans('admin.name'),
			'email' => trans('admin.email'),
			'password' => trans('admin.password'),
			'password_confirmation' => '',
		]);
		///// Check the Already Password ///////
		if (!empty(request('password')) && \Hash::check(request('password'), marketer()->user()->password)) {
			session()->flash('error', trans('admin.the_password_is_old'));
			return back();
		}
		///// Check the Already Password ///////
		unset($data['password_confirmation']);
		if (!empty(request('password'))) {
			$data['password'] = bcrypt(request('password'));
		} else {
			unset($data['password']);
		}
		if (request()->hasFile('photo_profile')) {
			it()->delete(marketer()->user()->photo_profile);
			$data['photo_profile'] = it()->upload('photo_profile', 'admin/' . marketer()->user()->id);
		}
		marketer()->user()->update($data);
		session()->flash('success', !empty(request('password')) ? trans('admin.updated_account_and_password') : trans('admin.updated'));
		return back();
	}



	// Marketer Register
    public function register_page() {
        return view('admin.marketer.register', ['title' => trans('admin.login_page')]);
    }
    public function register_post(Request $request){
        $data = $request->except("_token", "_method");
        $data['photo_profile'] = "";
        $data['password'] = bcrypt(request('password'));
        $marketer = Marketer::create($data);
        if (request()->hasFile('photo_profile')) {
            $marketer->photo_profile = it()->upload('photo_profile', 'marketer/' . $marketer->id);
            $marketer->save();
        }
        $redirect = isset($request["add_back"]) ? "/marketer" : "";
        return redirectWithSuccess(url('marketer/login' . $redirect), trans('admin.registered'));
    }

}
