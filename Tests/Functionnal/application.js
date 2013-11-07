var system = require('system');
var regex = /--url=/;
var uri = 'http://localhost/';
system.args.forEach(function (arg, i) {

    if (regex.test(arg))
        uri = arg.substr(6);
});


casper.test.begin('Normal Application', 2, function suite(test) {

    test.assert((uri != null) , 'Uri location on '+ uri);
    casper.start(uri, function () {
        test.assertTextExists("Bouya" , 'Application display');

    });

    casper.run(function () {
        require('utils').dump(casper.getPageContent());
        test.done();
    });
});
