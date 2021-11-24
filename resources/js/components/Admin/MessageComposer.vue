<template>
    <div class="composer">
        <textarea v-model="message" @keydown.enter="send" placeholder="Message..."></textarea>
    </div>
</template>

<script>
    export default {
        name: "MessageComposer",
        data(){
            return{
                message:'',
            }
        },
        methods:{
            send(e){
                e.preventDefault();
                if (this.message == ''){
                    return;
                }
                this.$emit('send',this.message);
                this.message='';
            }
        }
    }
</script>

<style lang="scss" scoped>
    .composer{
        textarea{
            width: 96%;
            margin: 10px;
            padding: 6px;
            border-radius: 3px;
            border: 1px solid lightgray;
            resize: none;
        }
    }
</style>
