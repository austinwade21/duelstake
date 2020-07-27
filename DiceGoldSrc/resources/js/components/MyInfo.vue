<template>
    <div class="modal fade" id="myInfoDialog" tabindex="-1" role="dialog"
         aria-labelledby="myInfoDialogTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0"
                        id="exampleModalScrollableTitle">My Info</h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="">

                    </div>
                    <div class="row">
                        <div class="col-lg-6" style="text-align-last: right;">
                            <vue-avatar
                                    :image="'/theme/images/users/avatar-2.jpg'"
                                    :width=200
                                    :height=200
                                    :rotation=parseFloat(rotation)
                                    :borderRadius=parseFloat(borderRadius)
                                    :scale=parseFloat(scale)
                                    ref="vueavatar"
                                    @vue-avatar-editor:image-ready="onImageReady"
                            >
                            </vue-avatar>
                        </div>
                        <div class="col-lg-6">
                            <label>
                                Zoom : {{scale}}x
                                <br>
                                <input
                                        type="range"
                                        min=1
                                        max=3
                                        step=0.02
                                        v-model='scale'
                                />
                            </label>
                            <br>
                            <label>
                                Rotation : {{rotation}}°
                                <br>
                                <input
                                        type="range"
                                        min=0
                                        max=360
                                        step=1
                                        v-model='rotation'
                                />
                            </label>
                            <br>
                            <label>
                                Radius : {{borderRadius}}px
                                <br>
                                <input
                                        type="range"
                                        min=0
                                        max=100
                                        step=1
                                        v-model='borderRadius'
                                />
                            </label>
                        </div>
                    </div>

                    <div class="save-my-info center-button">
                        <button class="btn btn-primary" v-on:click="saveClicked">Save image</button>
                    </div>
                    <br>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</template>

<script>
    import VueAvatar from "vue-avatar-editor-improved/src/components/VueAvatar";

    export default {
        name: "MyInfo",
        components: {
            VueAvatar,
        },
        data: function data() {
            return {
                scale: {
                    type: Number,
                    default: 1
                },
                rotation: {
                    type: Number,
                    default: 0
                },
                borderRadius: {
                    type: Number,
                    default: 0
                },
            };
        },

        methods: {
            saveClicked: function saveClicked() {
                const img = this.$refs.vueavatar.getImageScaled();
                axios.post('api/user/avatar/save', {
                    'api_token': window.api_token,
                    'avatar': img.toDataURL("image/png"),
                }).then(response => {
                    console.log(response);
                });

            },
            onImageReady: function onImageReady() {
                this.scale = 1;
                this.rotation = 0;
            }
        }
    }
</script>

<style scoped>

</style>