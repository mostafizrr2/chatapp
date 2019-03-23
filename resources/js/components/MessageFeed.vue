<template>
    <div class="feed" ref="feed">
        <ul v-if="contact">
            <li v-for="message in messages" :class="`message${message.to == contact.id ? ' sent' : ' received' }`" :key="message.id">
                <div class="text">
                   {{ message.text }}
                </div>               
            </li>        
        </ul>
    </div>
</template>
<script>
export default {
    props:{
        contact:{
            type:Object,
        },
        messages:{
            type:Array,
            required:true
        }
    },
    methods: {
        scrollToBottom(){
            setTimeout(() => {
               this.$refs.feed.scrollTop = this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;           
            }, 50);
        }
    },

    watch: {
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
        background: #ececec;
        height: 100%;
        max-height: 470px;
        overflow-y: auto;
        padding:20px;

        ul{
            list-style: none;
            padding: 0px;

            li{
                &.message {
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
                            background: turquoise;
                        }                               
                    }

                    &.sent{
                        text-align: left;
                        padding: 5px;

                        .text{
                           background: lightgray;
                        }
                    }
                }
            }
            
        }
    }
</style>
