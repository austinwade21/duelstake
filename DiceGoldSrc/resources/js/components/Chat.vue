<template>
    <div class="chat-leftsidebar" id="chat">
        <div class="chatting-history">
            <ul class="list-unstyled chat-list">
                <infinite-loading direction="top" @infinite="loadMessages">
                    <div slot="no-more">No more message</div>
                </infinite-loading>
                <ChatItem v-for="message in publicMessages"
                          v-bind:key="message.id"
                          :id="message.id"
                          :time="message.created_at"
                          :username="message.sender.user_name"
                          :message="message.message"
                          :avatar="message.avatar"
                          :status="message.status"
                          ></ChatItem>
            </ul>
        </div>
        <div class="p-3 chat-input-section">
            <div class="row">
                <div class="col">
                    <div class="position-relative">
                        <input v-model="newMessage" v-on:keyup.enter="sendMessage" type="text" class="form-control chat-input" placeholder="Enter Message...">

                    </div>
                </div>
                <div class="col-auto chat-send-div">
                    <button type="submit" class="btn btn-primary chat-send waves-effect waves-light"><i
                            class="mdi mdi-send" @click="sendMessage"></i></button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import InfiniteLoading from 'vue-infinite-loading';
    import ChatItem from "./ChatItem";
    export default {
        name: "Chat",
        components: {ChatItem, InfiniteLoading},
        data() {
            return {
                publicMessages:[
                    // {
                    //     created_at: "2020-07-09T03:34:43.000000Z",
                    //     id: 3,
                    //     is_public: 1,
                    //     message: "sdfsdf sdf sdf",
                    //     receiver: null,
                    //     receiver_id: null,
                    //     sender: {id: 1, user_name: "kkuk"},
                    //     updated_at: "2020-07-09T03:34:43.000000Z",
                    //     user_id: 1
                    // },
                ],
                newMessage: null,
                lastId: -1,
            }
        },
        watch:{
        },
        methods: {
            sendMessage() {
                if(this.newMessage !== null && this.newMessage !== ''){
                    axios.post('api/messages/send', {
                        'api_token': window.api_token,
                        'sender_id': window.userid,
                        'receiver_id': null,
                        'message': this.newMessage,
                        'is_public': true,
                    }).then(response => {
                        console.log(response);
                        this.newMessage = null;
                    });

                }
            },
            scrollDownChattingHistory(){
                var container = this.$el.querySelector(".chatting-history");
                container.scrollTop = container.scrollHeight;
            },
            loadMessages($state){
                var url = 'api/messages/' + this.lastId;
                axios.get(url, {headers:{'Authorization': 'Bearer ' + window.api_token}}).then(response => {
                    if(response.data.data.length > 0){
                        this.publicMessages.unshift(...response.data.data.reverse());
                        this.lastId = this.publicMessages[0].id;
                        $state.loaded();
                    }
                    else{
                        $state.complete();
                    }
                });
            },
            // scrollListener(e){
            //     if(this.loadedAll || this.isLoading) return;
            //     var container = this.$el.querySelector(".chatting-history");
            //     if(container.scrollTop < 1 && !this.loadedAll && !this.isLoading){
            //         this.loadMessages();
            //     }
            //     this.isBottom = container.scrollTop >= container.scrollHeight;
            // }
        },
        created() {
            window.Echo.channel('public-message')
                .listen('.MessageSent', (data) => {
                    this.publicMessages.push(data.message);
                    self = this;
                    setTimeout(function () {
                        self.scrollDownChattingHistory();
                    }, 200);
                });

            // this.loadMessages(); // because InfiniteLoading trigger initial loading, it is no need to call it manually.
        },
        mounted(){
            // var container = this.$el.querySelector(".chatting-history");
            // container.addEventListener('scroll', this.scrollListener);
        },
        updated() {
        }
    }
</script>

<style scoped>

</style>