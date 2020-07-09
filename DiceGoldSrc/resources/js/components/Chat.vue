<template>
    <div class="chat-leftsidebar" id="chat">
        <div>
            <ul class="list-unstyled chat-list" data-simplebar style="max-height: calc(100vh - 146px);">
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
                        <input v-model="newMessage" type="text" class="form-control chat-input" placeholder="Enter Message...">

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
    import ChatItem from "./ChatItem";
    export default {
        name: "Chat",
        components: {ChatItem},
        data() {
            return {
                publicMessages:[
                    {
                        created_at: "2020-07-09T03:34:43.000000Z",
                        id: 3,
                        is_public: 1,
                        message: "sdfsdf sdf sdf",
                        receiver: null,
                        receiver_id: null,
                        sender: {id: 1, user_name: "kkuk"},
                        updated_at: "2020-07-09T03:34:43.000000Z",
                        user_id: 1
                    },
                ],
                newMessage: null,
            }
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
        },
        created() {
            window.Echo.channel('public-message')
                .listen('.MessageSent', (data) => {
                    this.publicMessages.push(data.message);
                });

            axios.get('api/messages', {headers:{'Authorization': 'Bearer ' + window.api_token}}).then(response => {
                this.publicMessages = response.data.data;
            });

        }
    }
</script>

<style scoped>

</style>