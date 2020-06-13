<template>
  <div>
    <vue-dropzone
      ref="myVueDropzone"
      id="dropzone"
      :options="dropzoneOptions"
      :useCustomSlot="true"
      v-on:vdropzone-success="uploadSuccess"
      v-on:vdropzone-error="uploadError"
      v-on:vdropzone-removed-file="fileRemoved"
    >
      <div class="dropzone-custom-content">
        <h3 class="dropzone-custom-title">Drag and drop to upload content!</h3>
        <div class="subtitle">...or click to select a file from your computer</div>
      </div>
    </vue-dropzone>
  </div>
</template>

<script>
import vue2Dropzone from "vue2-dropzone";
import "vue2-dropzone/dist/vue2Dropzone.min.css";

export default {
  components: {
    vueDropzone: vue2Dropzone
  },

  data() {
    return {
      dropzoneOptions: {
        url: "/api/files",
        addRemoveLinks: true,
        maxFiles: 1
      },
      fileName: ''
    };
  },

  methods: {
    uploadSuccess(file, response) {
        console.log('File Successfully Uploaded with file name: ' + response.file);
        this.fileName = response.file;
    },
    uploadError(file, message) {
        console.log('An Error Occurred');
    },
    fileRemoved() {}
  }
};
</script>