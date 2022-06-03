<template>
    <div>
        <v-toolbar dark flat color="grey-lighten">
            <v-toolbar-title>Team</v-toolbar-title>
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
                                    <v-text-field v-model="editedItem.first_name" label="First name"></v-text-field>
                                </v-flex>
                                <v-flex xs12 >
                                    <v-text-field v-model="editedItem.second_name" label="Second name"></v-text-field>
                                </v-flex>
                                <v-flex xs12 >
                                    <v-text-field v-model="editedItem.patron_name" label="Patron name"></v-text-field>
                                </v-flex>
                                <v-flex xs12 >
                                    <v-text-field v-model="editedItem.position" label="Position"></v-text-field>
                                </v-flex>
                                <v-flex xs12 >
                                    <v-text-field v-model="editedItem.whatsapp" label="Whatsapp link"></v-text-field>
                                </v-flex>
                                <v-flex xs12 >
                                    <v-text-field v-model="editedItem.telegram" label="Telegram link"></v-text-field>
                                </v-flex>
                                <v-flex xs12 >
                                    <v-text-field v-model="editedItem.phone" label="Phone number"></v-text-field>
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
                <td>{{ props.item.first_name }}</td>
                <td class="text-xs-right">{{ props.item.second_name }}</td>
                <td class="text-xs-right">{{ props.item.patron_name }}</td>
                <td class="text-xs-right">{{ props.item.position }}</td>
                <td class="text-xs-right">{{ props.item.whatsapp }}</td>
                <td class="text-xs-right">{{ props.item.telegram }}</td>
                <td class="text-xs-right">{{ props.item.phone }}</td>
                <td class="text-xs-right">{{ props.item.img_path }}</td>
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
            {text: 'First name', value: 'first_name'},
            {text: 'Second name', value: 'second_name'},
            {text: 'Patron name', value: 'patron_name' },
            {text: 'Position', value: 'position'},
            {text: 'Whatsapp', value: 'whatsapp'},
            {text: 'Telegram', value: 'telegram'},
            {text: 'Phone', value: 'phone'},
            {text: 'Image', value: 'img_path'},
        ],
        tableData: [],
        editedIndex: -1,
        allPermissions:[],
        editedItem: {
            first_name: '',
            second_name: '',
            patron_name: '',
            position: '',
            whatsapp: '',
            phone: '',
            telegram: '',
            img_path: '',
        },
        defaultItem: {
            first_name: '',
            second_name: '',
            patron_name: '',
            position: '',
            whatsapp: '',
            phone: '',
            telegram: '',
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

            axios.get('/api/team').then(response => {
                this.tableData = response.data.data;
            });

            axios.get('/api/team').then(response=>this.allPermissions=response.data.data);
        },

        editItem(item) {
            this.editedIndex = this.tableData.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialog = true;
        },

        deleteItem(item) {
            const index = this.tableData.indexOf(item);
            confirm('Are you sure you want to delete this item?') && this.tableData.splice(index, 1);

            axios.delete('/api/team/'+item.id).then(response=>console.log(response.data))

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
                formdata.append("first_name", this.editedItem.first_name);
                formdata.append("second_name", this.editedItem.second_name);
                formdata.append("patron_name", this.editedItem.patron_name);
                formdata.append("position", this.editedItem.position);
                formdata.append("whatsapp", this.editedItem.whatsapp);
                formdata.append("telegram", this.editedItem.telegram);
                formdata.append("phone", this.editedItem.phone);
                formdata.append("img_path", this.editedItem.img_path);
                console.log(formdata.values());
                axios.post('/api/team/'+this.editedItem.id+"?_method=PUT",formdata).then(response=>console.log(response.data));
                this.initialize();
            } else {
                let formdata = new FormData();
                formdata.append("first_name", this.editedItem.first_name);
                formdata.append("second_name", this.editedItem.second_name);
                formdata.append("patron_name", this.editedItem.patron_name);
                formdata.append("position", this.editedItem.position);
                formdata.append("whatsapp", this.editedItem.whatsapp);
                formdata.append("telegram", this.editedItem.telegram);
                formdata.append("phone", this.editedItem.phone);
                formdata.append("img_path", this.editedItem.img_path);
                axios.post('/api/team', formdata).then(response=>console.log(response.data));
            }
            this.close();
        },
    },
};
</script>
