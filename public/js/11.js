window.Event = new Vue(); //shared Event Instance which is globally accessible in the window

//To replace $emit and $on with fire and listen
// window.Event = new class{
//     constructor() {
//         this.vue = new Vue();
//     }
//
//     fire(event, data=null){
//         this.vue.$emit(event, data);
//     }
//
//     listen(event, callback){
//         this.vue.$on(event, callback);
//     }
// };


Vue.component('coupon',{
    template:'<input type="text" placeholder="Enter your coupon code" @blur="coupon_applied">',

    methods:{
        coupon_applied() {
            // this.$emit('e_coupon_applied', { data to pass });
            Event.$emit('e_coupon_applied');

        }
    },

    created(){
        Event.$on('e_coupon_applied',() => alert('couponchild@created:event successfully listened '));
    },

    mounted(){
        Event.$on('e_coupon_applied',() => alert('couponchild@mounted:event successfully listened '));
    },
});

Vue.component('success-message',{

    template: '<slot></slot>',

    created(){
        Event.$on('e_coupon_applied',() => alert('messagechild@created:event successfully listened '));
    },

    mounted(){
        Event.$on('e_coupon_applied',() => alert('messagechild@mounted:event successfully listened '));
    },

    // completed(){
    //     alert('message : completed');
    //
    // },
    //
    // loaded(){
    //     alert('loaded');
    // },
    //
    // closed(){
    //     alert('closed');
    // },
    //
    // killed(){
    //     alert('killed');
    // },
    //
    // connected(){
    //     alert('connected');
    // },
    //
    // detached(){
    //     alert('detached');
    // },
    //
    // named(){
    //     alert('named');
    // },
    //
    // destroyed(){
    //     alert('destroyed');
    // },
    //
    // finished(){
    //     alert('finished');
    // }

});

new Vue({
    el:'#root',

    data:{
        is_applied:false
    },

    created(){
        Event.$on('e_coupon_applied', () => alert('parent@created:handling it'));
    },

    mounted(){
        Event.$on('e_coupon_applied', () => alert('parent@mounted:handling it'));
    }

});
