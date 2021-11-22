<template>
    <div class="feed" id="feed">
        <ul v-if="contact">
            <li v-for="message in messages" :class="`message${message.to == contact.id?' sent':' received'}`" :key="message.id">
                <h6 v-if="message.to == contact.id" style="font-size: 8px">You</h6>
                <div class="text">
                    {{message.text}}
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "MessagesFeed",
        props:{
            contact:{
                type:Object,
            },
            messages:{
                type:Array,
                required:true,
            }
        },
        methods:{
            scrollToBottom(){
                setTimeout(()=>{
                    var feed= document.getElementById('feed');
                    feed.scrollTop = feed.scrollHeight - feed.clientHeight;
                },50);
            }
        },
        watch:{
            contact(contact){
                this.scrollToBottom();
            },
            messages(messages){
                this.scrollToBottom();
            }
        }
    }
</script>

<style lang="scss" scoped>
.feed{
    height: 100%;
    overflow: scroll;
    overflow-x: hidden;
    max-height: 470px;
    background: #f0f0f0;
    ul{
        list-style-type: none;
        padding: 5px;
        li{
            &.message{
                margin: 10px 0;
                width: 100%;
                .text{
                    max-width: 200px;
                    padding: 12px;
                    border-radius: 5px;
                    display: inline-block;
                }
                &.received{
                    text-align: right;
                    .text{
                        background: lightgray;
                        color: black;
                    }
                }
                &.sent{
                    text-align: left;
                    .text{
                        background: dodgerblue;
                        color: white;
                    }
                }
            }
        }
    }
}
</style>
