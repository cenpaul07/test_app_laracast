new Vue({
    el:'#root',


    data:{
        verses : []
    },

    mounted(){
        axios.get('http://test_app.test/verses/').then(response => this.verses=response.data);
    }
});
