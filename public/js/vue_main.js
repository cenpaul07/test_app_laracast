Vue.component('tabs',{
    template:'' +
        '<div>' +

        '<div class="tabs">\n' +
        '  <ul>\n' +
        '    <li v-for="tab in tabs" :class="{\'is-active\':tab.isActive}">' +
        '   <a :href="tab.href" @click="selectTab(tab)">{{tab.name}}</a></li>\n' +
        '  </ul>\n' +
        '</div>' +

        '<div class="tab-details">' +
        '<slot></slot>' +
        '</div>' +

        '</div>',

    data(){
        return {
            tabs:[]
        };
    },
    created(){
        this.tabs = this.$children;
    },
    methods:{
        selectTab(selectedTab){
            this.tabs.forEach(tab=>{
                tab.isActive = (tab.name === selectedTab.name);
            });
        }
    }
});



Vue.component('tab',{
    props:{
        name:{required:true},
        selected:{default:false},
    },
    template:'<div v-show="isActive"><slot></slot></div>',

    data(){
        return{
            isActive:false
        }
    },

    mounted(){
        this.isActive=this.selected;
    },

    computed:
        {
        href()
            {
                return '#'+this.name.toLowerCase().replace(/ /g,'-');
            }
        }

});

Vue.component('modal',{
    template:'<div class="modal is-active" >\n' +
        '            <div class="modal-background"></div>\n' +
        '            <div class="modal-content">\n' +
        '                <div class="card" style="padding: 20px" >\n' +
        '                    <slot></slot>\n' +
        '                </div>\n' +
        '            </div>\n' +
        '            <button class="modal-close is-large" aria-label="close" @click="emit_close"></button>\n' +
        '        </div>',

    methods:{
        emit_close(){
            this.$emit('close_now');
        }
    }
});

Vue.component('message-box',{
    props:['title','body'],
    template:'<article class="message" v-show="is_visible">\n' +
        '            <div class="message-header">\n' +
        '                <p>{{title}}</p>\n' +
        '                <button class="delete" aria-label="delete" @click="hideNow"></button>\n' +
        '            </div>\n' +
        '            <div class="message-body">\n' +
        '                {{body}}' +
        '            </div>\n' +
        '        </article>',
    methods:{
        hideNow(){
            this.is_visible=false;
        }
    },
    data(){
        return{
            'is_visible':true,
        }
    }
});


Vue.component(
    'task-list',{
        template:'<div><task v-for="task in tasks">{{task.desc}}</task></div>',

        data(){
            return {
                tasks : [
                    { 'desc':'complete vue js','completed':false},
                    { 'desc':'complete php','completed':true},
                    { 'desc':'complete laravel','completed':true},
                    { 'desc':'complete webpack','completed':false},
                    { 'desc':'complete sql','completed':false},
                    { 'desc':'complete css','completed':false},
                    { 'desc':'complete html','completed':true},
                ]
            }
        }
    });

Vue.component('task',{
    template:'<li><slot></slot></li>',
});


new Vue({
    el: '#root',

    data:{
        is_visible:false
    },

    methods:{
        makeVisible(){
            this.is_visible=true;
        }
    }
});
