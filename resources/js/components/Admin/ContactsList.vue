<template>
    <div class="contact-list" style="height: 500px;">
        <ul>
            <li v-for="contact in sortedContacts" :key="contact.id" @click="selectContact(contact)"
                :class="{'selected':contact == selected}">
                <div class="avatar">
                    <img :src="'/storage/'+contact.photo_profile" :alt="contact.name">
                </div>
                <div class="contact">
                    <p class="name">{{contact.first_name_ar}}</p>
                    <p class="email">{{contact.email}}</p>
                </div>
                <span class="unread" v-if="contact.unread">{{contact.unread}}</span>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props:{
          contacts:{
              type:Array,
              default:[],
          }
        },
        name: "ContactsList",
        data(){
            return{
                selected: this.contacts.length ? this.contacts[0]:null,
            }
        },
        computed:{
          sortedContacts(){
              return _.sortBy(this.contacts,[(contact)=>{
                  if (contact == this.selected){
                      return Infinity;
                  }
                  return contact.unread;
              }]).reverse();
          }
        },
        methods:{
            selectContact(contact){
                this.selected=contact;
                this.$emit('selected',contact);
            }
        }
    }
</script>

<style lang="scss" scoped>
    .contact-list {
        flex: 2;
        max-height: 600px;
        overflow: scroll;
        overflow-x: hidden;
        border-left: 1px solid #a6a6a6;

        ul {
            list-style-type: none;
            padding-left: 0;
            padding-inline-start: 0px;
            border: 2px solid #6f42c1;
            border-radius: 2%;

            li:hover{
                background: #dfdfdf;
            }

            li {
                display: flex;
                padding: 2px;
                height: 80px;
                position: relative;
                cursor: pointer;
                border-bottom: 1px solid #6f42c1;
                border-radius: 2%;
                &.selected{
                    background: #a285d5;
                }
                span.unread{
                    color: white;
                    background-color: green;
                    position: absolute;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    right: 10px;
                    top: 10px;
                    padding: 0 4px;
                    border-radius: 20%;
                    line-height: 20px;
                    min-width: 20px;
                    font-weight: 700;
                    font-size: 12px;
                }
                .avatar{
                    flex: 1;
                    display: flex;
                    align-items: center;
                    img{
                        width: 35px;
                        border-radius: 50%;
                        margin: 0 auto;
                    }
                }
                .contact{
                    flex: 3;
                    font-size: 10px;
                    overflow: hidden;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    p{
                        margin: 0;
                        &.name{
                            font-weight: bold;
                        }
                    }
                }
            }
        }
    }
</style>
