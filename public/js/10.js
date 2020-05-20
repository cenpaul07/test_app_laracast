Vue.component('coupon',{
    template:'<input type="text" placeholder="Enter your coupon code" @blur="coupon_applied">',

    methods:{
        coupon_applied() {
            this.$emit('e_coupon_applied');
        }
    }
});

new Vue({
    el:'#root',

    data:{
        is_applied:false
    },

    methods:{
        coupon_applied(){
            this.is_applied=true;
        }
    }

});
