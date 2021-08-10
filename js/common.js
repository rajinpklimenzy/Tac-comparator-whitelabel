var Notification = {
    success: function (message, status) {
        if (window.hasOwnProperty('toastr')) {
            status = status || 'Success';
            Notification.allowMaximum(3);
            window.toastr.success(message, status);
        }
    },
    info: function (message, status) {
        if (window.hasOwnProperty('toastr')) {
            status = status || 'Info';
            Notification.allowMaximum(3);
            window.toastr.info(message, status);
        }
    },
    error: function (message, status) {
        if (window.hasOwnProperty('toastr')) {
            status = status || 'Error';
            Notification.allowMaximum(3);
            window.toastr.error(message, status);
        }
    },
    allowMaximum: function (max) {
        if ($('.toast').length >= max) {
            $('.toast:gt(' + (max -2)+ ')').remove();
        }
    }

}
var laravelActions = {
    initialize: function () {
        this.methodLinks = $('a[data-method]');

        this.registerEvents();
    },

    registerEvents: function () {
        this.methodLinks.unbind("click");
        this.methodLinks.on('click', this.handleMethod);
    },

    handleMethod: function (e) {
        var link = $(this);
        var httpMethod = link.data('method').toUpperCase();
        var form;

        // If the data-method attribute is not PUT or DELETE,
        // then we don't know what to do. Just ignore.
        if ($.inArray(httpMethod, ['PUT', 'DELETE']) === -1) {
            return;
        }

        // Allow user to optionally provide data-confirm="Are you sure?"
        if (link.data('confirm')) {
            if (!laravelActions.verifyConfirm(link)) {
                return false;
            }
        }

        form = laravelActions.createForm(link);
 
        form.submit();

        e.preventDefault();
    },

    verifyConfirm: function (link) {
        return confirm(link.data('confirm'));
    },

    createForm: function (link) {
        var form =
                $('<form>', {
                    'method': 'POST',
                    'action': link.attr('href')
                });

        var token =
                $('<input>', {
                    'type': 'hidden',
                    'name': '_token',
                    'value': $('meta[name="csrf-token"]').attr('content'), // hmmmm...
                });

        var hiddenInput =
                $('<input>', {
                    'name': '_method',
                    'type': 'hidden',
                    'value': link.data('method')
                });

        return form.append(token, hiddenInput)
                .appendTo('body');
    }
};
