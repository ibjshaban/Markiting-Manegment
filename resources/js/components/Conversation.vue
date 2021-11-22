<template>
    <div class="conversation">
        <h1>{{contact? contact.name:'Select a contact'}}</h1>
        <MessagesFeed :contact="contact" :messages="messages"></MessagesFeed>
        <MessageComposer @send="sendMessage"></MessageComposer>
    </div>
</template>

<script>
    import MessageComposer from "./MessageComposer";
    import MessagesFeed from "./MessagesFeed";
    export default {
        name: "Conversation",
        components:{MessagesFeed,MessageComposer},
        props:{
            contact:{
                type:Object,
                default:function(){
                    return null;
                },
            },
            messages:{
                type:Array,
                default:function () {
                    return [];
                },
            }
        },
        methods:{
            sendMessage(text){
               if (!this.contact){
                   return;
               }
               axios.post('/conversation/send',{
                   contact_id:this.contact.id,
                   text:text
               })
               .then((response)=>{
                   this.$emit('new',response.data)
                })
            },
        }

    }
</script>

<style lang="scss" scoped>
    .conversation{
        flex: 5;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        h1{
            font-size: 20px;
            padding: 10px;
            margin: 0;
            border-bottom: 1px dashed lightgray;
        }
    }
</style>
