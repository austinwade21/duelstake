<template>
    <div class="chat-leftsidebar" id="chat">
        <div class="chatting-history">
            <ul class="list-unstyled chat-list">
                <div class="chat-messages__scroll" v-if="canNavigate">
                    <div class="chat-messages__scroll-button" @click="scrollDownChattingHistory">
                        <i class="fas fa-angle-down"></i>&nbsp; New messages below
                    </div>
                </div>
                <infinite-loading direction="top" @infinite="loadMessages">
                    <div slot="no-more"></div>
                </infinite-loading>
                <ChatItem v-for="message in publicMessages"
                          v-bind:key="message.id"
                          :id="message.id"
                          :time="message.created_at"
                          :username="message.sender.user_name"
                          :message="message.message"
                          :avatar="message.sender.avatar"
                          :status="message.status"
                          ></ChatItem>
            </ul>
        </div>
        <div class="p-3 chat-input-section">
            <div class="row">
                <div class="col">
                    <div class="position-relative">
                        <TextareaEmojiPicker v-model="newMessage" v-on:key-enter="sendMessage" class="form-control chat-input" placeholder="Enter Message..."></TextareaEmojiPicker>
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
    import {mapGetters} from "vuex";

    import InfiniteLoading from 'vue-infinite-loading';
    import ChatItem from "./ChatItem";
    import TextareaEmojiPicker from "./TextareaEmojiPicker";
    export default {
        name: "Chat",
        components: {TextareaEmojiPicker, ChatItem, InfiniteLoading},
        computed: {
            ...mapGetters({
                authenticated: 'auth/authenticated',
                user: 'auth/user',
            })
        },
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
                canNavigate: false,
                isBottom: true,
            }
        },
        watch:{
        },
        methods: {
            async sendMessage() {
                if(this.newMessage !== null && this.newMessage !== ''){
                    if(!this.authenticated){
                        alert("You have to login!");
                        return;
                    }
                    await axios.get('/sanctum/csrf-cookie');
                    axios.post('api/messages/send', {
                        'sender_id': this.user.id,
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
                this.canNavigate = false;
                this.isBottom = true;
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
            scrollListener(e){
                const container = this.$el.querySelector(".chatting-history");
                const self2 = this;
                setTimeout(function () {
                    self2.isBottom = container.scrollTop + container.clientHeight >= container.scrollHeight - 50;
                    self2.canNavigate = !self2.isBottom;
                }, 100);
            }
        },
        created() {
            window.Echo.channel('public-message')
                .listen('.MessageSent', (data) => {
                    this.publicMessages.push(data.message);
                    self = this;
                    if(this.isBottom){
                        setTimeout(function () {
                            self.scrollDownChattingHistory();
                        }, 200);
                    }
                    this.canNavigate = !this.isBottom;
                });

            // this.loadMessages(); // because InfiniteLoading trigger initial loading, it is no need to call it manually.
        },
        mounted(){
            var container = this.$el.querySelector(".chatting-history");
            container.addEventListener('scroll', this.scrollListener);
        },
        updated() {
        }
    }
</script>

<style scoped>

</style>