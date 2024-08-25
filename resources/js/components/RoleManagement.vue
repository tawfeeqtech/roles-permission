<template>
    <div>
        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-primary" @click="openModal('create')">
            Create Role
        </button>

        <!-- Role List -->
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Role List</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center justify-content-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            #</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Name</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Permissions</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="role in roles" :key="role.id">
                                        <td>
                                            <div class="d-flex px-2">
                                                <div class="my-auto">
                                                    <h6 class="mb-0 text-sm">{{ role.id }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold">{{ role.name }}</span>
                                        </td>

                                        <td class="align-middle text-center ">
                                            <span class="badge badge-sm bg-secondary"
                                                v-for="permission in role.permissions" :key="permission.id">
                                                {{ permission.name }}
                                            </span>
                                        </td>


                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">
                                                <button @click="openModal('edit', role)">Edit</button>

                                                <button @click="deleteRole(role.id)">Delete</button>
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Role Modal -->
        <div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="roleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="roleModalLabel">{{ modalTitle }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="saveRole">
                            <div class="mb-3">
                                <label for="roleName" class="form-label">Role Name:</label>
                                <input type="text" v-model="form.name" id="roleName" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label for="permissions" class="form-label">Permissions:</label>
                                <select v-model="form.permissions" id="permissions" multiple class="form-select">
                                    <option v-for="permission in permissions" :key="permission.id"
                                        :value="permission.id">
                                        {{ permission.name }}
                                    </option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ buttonText }}</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { ref } from 'vue';

export default {
    data() {
        return {
            roles: [],
            permissions: [],
            form: {
                id: null,
                name: '',
                permissions: []
            },
            modalTitle: 'Create Role',
            buttonText: 'Create Role'
        };
    },
    mounted() {
        this.fetchRoles();
        this.fetchPermissions();
    },
    methods: {
        fetchRoles() {
            axios.get('/api/roles')
                .then(response => {
                    this.roles = response.data;
                })
                .catch(error => {
                    console.error('Error fetching roles:', error);
                });
        },
        fetchPermissions() {
            axios.get('/api/permissions')
                .then(response => {
                    this.permissions = response.data;
                })
                .catch(error => {
                    console.error('Error fetching permissions:', error);
                });
        },
        openModal(action, role = null) {
            // console.log(role.permissions);

            this.form = role ? { ...role, permissions: role.permissions.map(p => p.id) } : { id: null, name: '', permissions: [] };
            this.modalTitle = action === 'create' ? 'Create Role' : 'Edit Role';
            this.buttonText = action === 'create' ? 'Create Role' : 'Update Role';

            const modalElement = document.getElementById('roleModal');
            const modal = bootstrap.Modal.getOrCreateInstance(modalElement);
            modal.show();
        },
        saveRole() {
            const url = this.form.id ? `/api/roles/${this.form.id}` : '/api/roles';
            const method = this.form.id ? 'put' : 'post';

            axios[method](url, this.form)
                .then(response => {
                    this.fetchRoles();
                    this.closeModal();
                })
                .catch(error => {
                    console.error('Error saving role:', error);
                });
        },
        deleteRole(id) {
            axios.delete(`/api/roles/${id}`)
                .then(() => {
                    this.fetchRoles();
                })
                .catch(error => {
                    console.error('Error deleting role:', error);
                });
        },
        closeModal() {
            const modalElement = document.getElementById('roleModal');
            const modal = bootstrap.Modal.getInstance(modalElement);
            modal.hide();
        }
    }
};
</script>

<style scoped>
/* Add your styles here */
</style>
