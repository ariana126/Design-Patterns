const NotificationMediator = function() {
    this.channels = {};
}

NotificationMediator.prototype = {
    subscribe : function (name, fn) {
        this.channels[name] = fn;
    },
    notify: function (name, change) {
        this.channels[name](change);
    }
}

(function() {
    const notification = new MediatorPattern();
    notification.subscribe('o1', color => {$('#o1').css('background',color)} );
    notification.subscribe('o2', color => {$('#o2').css('background',color)} );
    notification.subscribe('o3', color => {$('#o3').css('background',color)} );

    notification.notify('o1','red')
    notification.notify('o2','blue')
    notification.notify('o3','yellow')

}())