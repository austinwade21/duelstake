<template>
    <li>
        <a href="#">
            <div class="media">
                <div :class="{online: status}" class="user-img align-self-center mr-3">
                    <img v-if="avatar" :src="avatar" class="rounded-circle avatar-xs" alt="">
                    <div v-else class="avatar-xs align-self-center">
                        <span class="avatar-title rounded-circle bg-light text-body">{{firstCharacter}}</span>
                    </div>

                    <span class="user-status"></span>
                </div>
                <div class="media-body overflow-hidden">
                    <h5 class="text-truncate font-size-14 mb-1">{{username}}</h5>
                    <p class="text-truncate mb-0">{{message}}</p>
                </div>
                <div class="font-size-11">{{time|toLocalTimeString}}</div>
            </div>
        </a>
    </li>

</template>

<script>
    export default {
        name: "ChatItem",
        props: ['id', 'time', 'username', 'avatar', 'message', 'status'],
        computed: {
            firstCharacter(){
                return this.username.charAt(0).toUpperCase();
            }
        }
    }
</script>

<style scoped>

</style>