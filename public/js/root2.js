class ErrorData{

    constructor()
    {
        this.errors = {};
    }

    has(field){
        if (this.errors.errors !== undefined)
        {
        return this.errors.errors.hasOwnProperty(field);
        }
    }

    any_errors(){
        if (this.errors.errors !== undefined){
        return Object.keys(this.errors.errors).length > 0;
        }
        return false
        //checking the no. of keys in the error object
    }

    get(field)
    {
        if (this.errors['errors'] !== undefined)
        {
            if (this.errors['errors'][field])
            {
                return this.errors['errors'][field][0];
            }
        }
    }

    record(errors)
    {
        this.errors = errors;
    }

    clear_input(field){

        if(field){
            if (this.errors['errors'] !== undefined){
                delete this.errors.errors[field];
                return
            }
        }

        this.errors = {};


    }
}

class Form{

    constructor(data) {
        this.orginalData = data;

        for(let field in data){
            this[field] = data[field];
        }

        this.error_data=new ErrorData();
    }

    data(){

        let data = Object.assign({}, this);

        delete data.orginalData;
        delete data.error_data;

        return data;

    }

    submit(requestType, url){

        axios[requestType](url,this.data())
            .then(this.onSuccess.bind(this))
            .catch(this.onFail.bind(this));

    }

    onSuccess(response){
        alert(response.data.message);
        this.error_data.clear_input();
        this.reset()
    }

    onFail(error){

        this.error_data.record(error.response.data)

    }

    reset(){

        for(let field in this.orginalData){
            this[field] = '';
        }


    }

}

new Vue({
    el:'#root2',

    data:{
        form : new Form({
            'project_name': '',
            'project_desc': '',
        }),

    },

    methods:{
        submit_now()
        {
            this.form.submit('post','/projects');
        },
    }

});
