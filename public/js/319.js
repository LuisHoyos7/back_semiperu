"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[319],{4476:(e,t,o)=>{o.r(t),o.d(t,{default:()=>E});var l=o(821),r={class:"app-header-content"},n={class:"row justify-content-between align-items-center"},a=(0,l.createElementVNode)("div",{class:"col-auto"},[(0,l.createElementVNode)("a",{id:"sidepanel-toggler",class:"sidepanel-toggler d-inline-block d-xl-none",href:"#"},[(0,l.createElementVNode)("svg",{xmlns:"http://www.w3.org/2000/svg",width:"30",height:"30",viewBox:"0 0 30 30",role:"img"},[(0,l.createElementVNode)("title",null,"Menu"),(0,l.createElementVNode)("path",{stroke:"currentColor","stroke-linecap":"round","stroke-miterlimit":"10","stroke-width":"2",d:"M4 7h22M4 15h22M4 23h22"})])])],-1),d={class:"app-utilities col-auto"},s={class:"app-utility-item"},i={class:"form-label"},c={class:"d-none d-xl-block"},u={class:"app-utility-item app-user-dropdown dropdown"},m=(0,l.createElementVNode)("a",{class:"dropdown-toggle",id:"user-dropdown-toggle","data-bs-toggle":"dropdown",href:"#",role:"button","aria-expanded":"false"},[(0,l.createElementVNode)("img",{src:"/images/guest.png",alt:"user profile",style:{"object-fit":"cover"}})],-1),p={class:"dropdown-menu","aria-labelledby":"user-dropdown-toggle"},g=(0,l.createElementVNode)("li",null,[(0,l.createElementVNode)("a",{class:"dropdown-item",href:"#"},"Perfil")],-1),h=(0,l.createElementVNode)("li",null,[(0,l.createElementVNode)("hr",{class:"dropdown-divider"})],-1);const w={name:"Header",props:["username"],data:function(){return{gola:{name:null}}},methods:{logout:function(){return this.$store.dispatch("logout"),this.$router.go(0)}},computed:{getUser:function(){return this.$store.state.user}}};const E=(0,o(3744).Z)(w,[["render",function(e,t,o,w,E,N){return(0,l.openBlock)(),(0,l.createElementBlock)("div",r,[(0,l.createElementVNode)("div",n,[a,(0,l.createElementVNode)("div",d,[(0,l.createElementVNode)("div",s,[(0,l.createElementVNode)("label",i,[(0,l.createElementVNode)("span",c,(0,l.toDisplayString)(void 0===N.getUser.name?"":N.getUser.name),1)])]),(0,l.createElementVNode)("div",u,[m,(0,l.createElementVNode)("ul",p,[g,h,(0,l.createElementVNode)("li",null,[(0,l.createElementVNode)("a",{class:"dropdown-item",href:"#",onClick:t[0]||(t[0]=function(){return N.logout&&N.logout.apply(N,arguments)})},"Cerrar Sesión")])])])])])])}]])}}]);
//# sourceMappingURL=319.js.map