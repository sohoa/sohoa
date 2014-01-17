var system = require('system');
var regex = /--url=/;
var uri = 'http://localhost/';
system.args.forEach(function (arg, i) {

    if (regex.test(arg))
        uri = arg.substr(6);
});


casper.test.begin('Normal Application', 3, function suite(test) {

    test.assert((uri != null) , 'Uri location on '+ uri);
    casper.start(uri, function () {
        test.assertTextExists("Bouya" , 'Application display');

    });
    casper.start(uri + '/Main/Sample/', function () {
        test.assertTitle("Layout" , 'Basic App : Title');
        test.assertSelectorHasText('p' , 'Hello world');

    });

    casper.run(function () {
        require('utils').dump(casper.getPageContent());
        test.done();
    });
});

// Run command casperjs  test  Tests/Functionnal/application.js --url="http://so.hoa" if your app is located on http://so.hoa address