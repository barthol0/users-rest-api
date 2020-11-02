<template>
    <div class="container">
        <button class="btn btn-primary" v-on:click="getAllUsers">
            Get Users
        </button>
        <hr />

        <form @submit.prevent>
            <div class="form-row">
                <input
                    type="email"
                    name="email"
                    class="form-control"
                    v-model="formData.email"
                    placeholder="Email Address"
                />
            </div>
            <div class="form-row">
                <input
                    type="text"
                    name="firstname"
                    class="form-control"
                    v-model="formData.firstname"
                    placeholder="First name"
                />
            </div>
            <div class="form-row">
                <input
                    type="text"
                    name="surname"
                    class="form-control"
                    v-model="formData.surname"
                    placeholder="Surname"
                />
            </div>
            <div class="form-row">
                <input
                    type="date"
                    name="date_of_birth"
                    class="form-control"
                    v-model="formData.date_of_birth"
                    placeholder="Date of birth"
                />
            </div>
            <div class="form-row">
                <input
                    type="text"
                    name="phone_number"
                    class="form-control"
                    v-model="formData.phone_number"
                    placeholder="Phone"
                />
            </div>

            <button class="btn btn-success" v-on:click="addUser">
                Add User
            </button>

            <button class="btn btn-warning" v-on:click="updateUser">
                Update User
            </button>
            <hr />

            <input
                type="number"
                name="user_id"
                class="form-control"
                v-model="formData.user_id"
                placeholder="User ID"
            />
            <button class="btn btn-danger" v-on:click="deleteUser">
                Delete User
            </button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            formData: {
                email: "",
                firstname: "",
                surname: "",
                date_of_birth: "",
                phone_number: "",
                user_id: ""
            }
        };
    },
    methods: {
        getAllUsers() {
            axios.get("/api/users").then(response => {
                console.log(response);
                this.users = response.data;
            });
        },
        addUser() {
            const formData = new FormData();
            formData.append("Email", this.email);
            formData.append("Firstname", this.firstname);
            formData.append("Surname", this.surname);
            formData.append("DateOfBirth", this.date_of_birth);
            formData.append("PhoneNumber", this.phone_number);

            console.log(this.formData);

            axios.post("/api/user", this.formData).then(response => {
                console.log(response);
            });
        },
        updateUser() {
            const formData = new FormData();
            formData.append("Email", this.email);
            formData.append("Firstname", this.firstname);
            formData.append("Surname", this.surname);
            formData.append("DateOfBirth", this.date_of_birth);
            formData.append("PhoneNumber", this.phone_number);

            console.log(this.formData);

            axios.put("/api/user", this.formData).then(response => {
                console.log(response);
            });
        },
        deleteUser() {
            const formData = new FormData();
            formData.append("user_id", this.user_id);

            let requestUrl = `/api/user/${this.formData.user_id}`;

            axios.delete(requestUrl).then(response => {
                console.log(response);
            });
        }
    }
};
</script>
