<template>
    <div>
        <v-toolbar dark flat color="grey-lighten">
            <v-toolbar-title>Reports</v-toolbar-title>
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
                <td class="text-xs-right">{{ props.item.file }}</td>
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
            {text: 'File', value: 'file', sortable: false},
            {text: 'Date', value: 'file', sortable: false},
        ],
        tableData: [],
        editedIndex: -1,
        allPermissions:[],
        editedItem: {
            name: '',
            file: '',
        },
        defaultItem: {
            name: '',
            created_at: '',
            file: '',
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

            axios.get('/api/report').then(response => {
                this.tableData = response.data.data;
            });

            axios.get('/api/report').then(response=>this.allPermissions=response.data.data);
        },

        editItem(item) {
            this.editedIndex = this.tableData.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialog = true;
        },

        deleteItem(item) {
            const index = this.tableData.indexOf(item);
            confirm('Are you sure you want to delete this item?') && this.tableData.splice(index, 1);

            axios.delete('/api/report/'+item.id).then(response=>console.log(response.data))

        },
        handleFileUpload() {
            this.editedItem.file = this.$refs.file.files[0];
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
                formdata.append("file", this.editedItem.file);
                formdata.append("name", this.editedItem.name);
                console.log(formdata.values());
                axios.post('/api/report/'+this.editedItem.id+"?_method=PUT",formdata).then(response=>console.log(response.data));
                this.initialize();
            } else {
                let formdata = new FormData();
                formdata.append("file", this.editedItem.file);
                formdata.append("name", this.editedItem.name);
                axios.post('/api/report', formdata)
                    .then(response=>console.log(response.data))
                    .then(response=>this.tableData.push(response.data))
            }
            this.close();
        },
    },
};
</script>
