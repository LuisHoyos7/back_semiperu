<template>
    <div class="app">
        <header class="app-header fixed-top">
            <div class="app-header-inner">
                <div class="container-fluid py-2">
                    <Header></Header>
                </div>
            </div>
            <div id="app-sidepanel" class="app-sidepanel">
                <div id="sidepanel-drop" class="sidepanel-drop"></div>
                <div class="sidepanel-inner d-flex flex-column">
                    <Sidebar></Sidebar>
                    <SidebarFooter></SidebarFooter>
                </div>
            </div>
        </header>

        <div class="app-wrapper">
	        <div class="app-content pt-3 p-md-3 p-lg-4">
                <div class="container-xl">
                    <router-view />
                </div>
            </div>

            <Footer></Footer>
        </div>
    </div>
</template>

<script>
import {defineAsyncComponent} from "vue";

const Header = defineAsyncComponent(()=> import("./components/partials/Header"));
// import Header from './components/partials/Header';
import Sidebar from './components/partials/Sidebar';
import Footer from './components/partials//Footer';
import SidebarFooter from './components/partials/SidebarFooter';

export default {
    components: {
        Header,
        Sidebar,
        Footer,
        SidebarFooter
    },
    data: ()=>{
        return {
            user: null
        }
    }
}
</script>
<style>
    .form-control {
        height: 2rem;
        padding-top: 0.2rem;
        padding-bottom: 0.2rem;
    }
</style>
