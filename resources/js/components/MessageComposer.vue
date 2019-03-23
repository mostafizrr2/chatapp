<template>
    <div class="composer">
        <textarea v-model="message" @keydown.enter="send" placeholder="Message..."></textarea>
    </div>
</template>
<script>
export default {
    data(){
        return{
           message:'',
        }
    },
    methods: {
        send(e){
            
            e.preventDefault();
            
            if(this.message == ""){
                 return;   
            }

            this.$emit('send', this.message);
            this.message = "";
        }
    },
}
</script>
<style lang="scss" scoped>
.composer{
    textarea {
        width: 96%;
        resize: none;
        margin: 10px;
        border-radius: 3px;
        padding: 10px;
    }
}
</style>
