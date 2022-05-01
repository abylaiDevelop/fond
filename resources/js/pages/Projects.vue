<template>
    <div>
        <v-toolbar dark flat color="grey-lighten">
            <v-toolbar-title>Projects</v-toolbar-title>
            <v-divider
                class="mx-2"
                inset
                vertical
            ></v-divider>
            <v-spacer></v-spacer>
            <v-dialog v-model="dialog" max-width="700px">
                <v-btn slot="activator" color="primary" dark class="mb-2">New Item</v-btn>
                <v-card>
                    <v-card-title>
                        <span class="headline">{{ formTitle }}</span>
                    </v-card-title>

                    <v-card-text>
                        <v-container grid-list-md>
                            <v-layout wrap>
                                <v-flex xs12 >
                                    <v-text-field v-model="editedItem.name" label="Name"></v-text-field>
                                </v-flex>
                                <v-flex xs12 >
                                    <v-text-field v-model="editedItem.preview_text" label="Preview"></v-text-field>
                                </v-flex>
                                <v-flex xs12 >
                                    <input v-on:change="handleFileUpload()" type="file" id="file" ref="file">
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-card-text>

                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="blue darken-1" flat @click="close">Cancel</v-btn>
                        <v-btn color="blue darken-1" flat @click="save">Save</v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-toolbar>
        <v-data-table
            :headers="headers"
            :items="tableData"
            class="elevation-1"
        >
            <template slot="items" slot-scope="props">
                <td>{{ props.item.name }}</td>
                <td class="text-xs-right">{{ props.item.preview_text }}</td>
                <td class="text-xs-right">{{ props.item.img_path }}</td>
                <td class="text-xs-right">{{ props.item.created_at }}</td>
                <td class="justify-center layout px-0">
                    <v-icon
                        small
                        class="mr-2"
                        @click="editItem(props.item)"
                    >
                        edit
                    </v-icon>
                    <v-icon
                        small
                        @click="deleteItem(props.item)"
                    >
                        delete
                    </v-icon>
                </td>
            </template>
            <template slot="no-data">
                <v-btn color="primary" @click="initialize">Reset</v-btn>
            </template>
        </v-data-table>
    </div>
</template>

<script>
export default {
    data: () => ({
        dialog: false,
        headers: [
            {text: 'Name', value: 'name'},
            {text: 'Text', value: 'preview_text'},
            {text: 'Image', value: 'img_path', sortable: false},
            {text: 'Date', value: 'img_path', sortable: false},
        ],
        tableData: [],
        editedIndex: -1,
        allPermissions:[],
        editedItem: {
            name: '',
            preview_text: '',
            img_path: '',
        },
        defaultItem: {
            name: '',
            created_at: '',
            preview_text: '',
            img_path: '',
        },

    }),

    computed: {
        formTitle() {
            return this.editedIndex === -1 ? 'New Item' : 'Edit Item';
        },
    },

    watch: {
        dialog(val) {
            val || this.close();
        },
    },

    created() {
        this.initialize();
    },

    methods: {
        initialize() {

            axios.get('/api/projects').then(response => {
                this.tableData = response.data.data;
            });

            axios.get('/api/projects').then(response=>this.allPermissions=response.data.data);
        },

        editItem(item) {
            this.editedIndex = this.tableData.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialog = true;
        },

        deleteItem(item) {
            const index = this.tableData.indexOf(item);
            confirm('Are you sure you want to delete this item?') && this.tableData.splice(index, 1);

            axios.delete('/api/projects/'+item.id).then(response=>console.log(response.data))

        },
        handleFileUpload() {
            this.editedItem.img_path = this.$refs.file.files[0];
        },

        close() {
            this.dialog = false;
            setTimeout(() => {
                this.editedItem = Object.assign({}, this.defaultItem);
                this.editedIndex = -1;
            }, 300);
        },

        save() {

            if (this.editedIndex > -1) {
                Object.assign(this.tableData[this.editedIndex], this.editedItem);
                let formdata = new FormData();
                formdata.append("img_path", this.editedItem.img_path);
                formdata.append("name", this.editedItem.name);
                formdata.append("preview_text", this.editedItem.preview_text);
                console.log(formdata.values());
                axios.post('/api/projects/'+this.editedItem.id+"?_method=PUT",formdata).then(response=>console.log(response.data));
                this.initialize();
            } else {
                let formdata = new FormData();
                formdata.append("img_path", this.editedItem.img_path);
                formdata.append("name", this.editedItem.name);
                formdata.append("preview_text", this.editedItem.preview_text);
                this.tableData.push(this.editedItem);

                axios.post('/api/projects', formdata).then(response=>console.log(response.data));
            }
            this.close();
        },
    },
};
</script>
