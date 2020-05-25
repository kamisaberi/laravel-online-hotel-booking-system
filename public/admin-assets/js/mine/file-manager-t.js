var FILE_MANAGER = FILE_MANAGER || (function () {
    var _args = {}; // private

    return {
        init: function (Args) {
            this.parse(Args);
        },
        helloWorld: function () {
            alert('Hello World! -' + _args['name']);
        },
        parse: function (args) {
            for (let elm in args) {
                _args[elm] = args[elm];
            }
        }
    };
}());