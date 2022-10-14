<template>
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <Header></Header>
        <div class="page-body-wrapper">
            <Sidebar></Sidebar>
            <div class="page-body">
                <router-view/>
            </div>
            <Footer></Footer>
        </div>
     </div>
</template>

<script>
import Header from './components/partials/Header';
import Sidebar from './components/partials/Sidebar';
import Footer from './components/partials//Footer';

export default {
    components: {
        Header,
        Sidebar,
        Footer
    },
    setup() {

    },
}
</script>
