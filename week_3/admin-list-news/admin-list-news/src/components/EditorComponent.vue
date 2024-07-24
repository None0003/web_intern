<template>
    <div class="tool-box">
        <form @submit.prevent="handleSubmit" class="mx-4 py-4">
            <div>
                <label class="required my-2" for="category">Category</label> <br>
                <select class="mb-3 py-2 w-100 input-box" id="category" v-model="formData.selectedCategory" required>
                <option disabled value="">Please select one</option>
                <option v-for="option in options" :key="option" :value="option">
                    {{ option }}
                </option>
                </select>
            </div>
            <div>
                <label class="required my-2" for="title">Title</label> <br>
                <input class="mb-3 py-2 w-100 input-box" type="text" id="title" v-model="formData.title" @input="updateSlugPlaceholder" required />
            </div>
            <div>
                <label class="required my-2" for="slug">Slug</label> <br>
                <input class="mb-3 py-2 w-100 input-box" type="text" id="slug" v-model="formData.slug" :placeholder="slugPlaceholder" required />
            </div>
            <div>
                <label class="my-2" for="image">Image</label> <br>
                <input class="mb-3 py-2 w-100 input-box image-box" type="file" id="image" @change="handleFileUpload" accept="image/*" />
            </div>
            <div v-if="imagePreview">
                <img :src="imagePreview" alt="Image Preview" style="max-width: 100%; height: auto;" />
            </div>
            <div>
                <label class="my-2" for="content">Content</label> <br>
                <textarea class="mb-3 py-2 w-100 input-box" id="content" v-model="formData.content"></textarea>
            </div>
            <div class="d-flex mt-2 mb-3">
                <label>Status: </label>
                <div v-for="getStatus in status" :key="getStatus">
                    <input class="ms-4" type="radio" :id="getStatus" :value="getStatus" v-model="formData.selectedStatus" />
                    <label class="ms-2" :for="getStatus">{{ getStatus }}</label>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-light px-5" @click="handleCancel">Cancel</button>
                <button type="button" class="btn btn-secondary px-5 mx-5" @click="handleDraft">Draft</button>
                <button type="submit" class="btn btn-success px-5" @click="handleSave">Save</button>
            </div>
        </form>
        <div v-if="submitted">
            <h2>Form Data Submitted:</h2>
            <p>Title: {{ formData.title }}</p>
            <p>Slug: {{ formData.slug }}</p>
            <p>Content: {{ formData.content }}</p>
            <p>Selected Category: {{ formData.selectedCategory }}</p>
            <p>Selected Status: {{ formData.selectedStatus }}</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CreateNewsComponent",
        data() {
            return {
            formData: {
                title: '',
                slug: '',
                content: '',
                selectedCategory: '',
                selectedStatus: 'Published',
                imageFile: null,
            },
            options: ['Adventure Travel', 'Beach', 'Explore World', 'Family Holiday', 'Art and culture'],
            status: ['Published', 'Unpublished'],
            imagePreview: null,
            submitted: false
            };
        },
        methods: {
            handleFileUpload(event) {
                const file = event.target.files[0];
                this.formData.imageFile = file;

                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                    this.imagePreview = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            },
            handleCancel() {
                console.log('Cancel button clicked');
            },
            handleDraft() {
                console.log('Draft button clicked');
            },
            handleSave() {
                console.log('Save button clicked');
            },
            handleSubmit() {
                this.submitted = true;
                console.log('Form submitted:', this.formData);
            },
            updateSlugPlaceholder(event) {
                const newTitle = event.target.value;
                this.slugPlaceholder = newTitle.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '');
            },
        },
    }
</script>

<style scoped>
    .tool-box {
        background-color: white;
        border-radius: 8px;
    }
    .input-box {
        border-radius: 8px;
    }
    .required:after {
        content:" *";
        color: red;
    }
</style>