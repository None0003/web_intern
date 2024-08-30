<template>
    <div class="d-flex justify-content-end align-items-center py-4 bg-white profile-box">
        <div class="profile-name">John</div>
        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(2).webp"
                class="rounded-circle img-fluid shadow-1-strong ms-2 me-5" alt="smaple image" width="50"
                height="50" />
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"></button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="#" @click="logout">Logout</a></li>
                <!-- Add more options if needed -->
        </ul>
    </div>
</template>

<script>
import axios from '../plugins/axios'; // Update this path based on your setup
import { useRouter } from 'vue-router';

export default {
    name: "ProfileBarComponent",
    setup() {
        const router = useRouter();

        const logout = async () => {
            try {
                // Call the logout API endpoint
                await axios.post('logout');
                
                // Optionally clear any authentication tokens or data here
                
                // Redirect to login page or home page
                router.push('/login'); // Adjust this path based on your routing setup
            } catch (error) {
                console.error('Logout failed:', error);
                // Handle logout failure (e.g., show an error message)
            }
        };

        return {
            logout,
        };
    },
};
</script>
