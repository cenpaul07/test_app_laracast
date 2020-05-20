
Vue.component('modal-box',{

    template:
        '<div class="modal is-active">\n' +
        '  <div class="modal-background"></div>\n' +
        '  <div class="modal-card">\n' +
        '    <header class="modal-card-head">\n' +
        '      <p class="modal-card-title"><slot name="header">Default Header</slot></p>\n' +
        '      <button class="delete" aria-label="close"></button>\n' +
        '    </header>\n' +
        '    <section class="modal-card-body">\n' +
        '      <slot name="content">Default content goes here!</slot> \n' +
        '    </section>\n' +
        '    <footer class="modal-card-foot">\n' +
        '       <slot name="footer">' +
            '      <button class="button is-success">Save changes</button>\n' +
            '      <button class="button">Cancel</button>' +
        '       </slot>\n' +
        '    </footer>\n' +
        '  </div>\n' +
        '</div>'

});

new Vue({
    el:'#root',
});
