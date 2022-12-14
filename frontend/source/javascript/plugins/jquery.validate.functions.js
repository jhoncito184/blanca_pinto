var ServerData = new Date();

jQuery.validator.addMethod("check_age", function(value, element) {
    var pieces = value.split('-'),
        e = pieces[2],
        i = pieces[1],
        n = pieces[0], s = 18,
        o = new Date();
    o.setFullYear(n, i - 1, e);
    var r = new Date();
    return r.setFullYear(ServerData.getFullYear() - s), r >= o
}, jQuery.validator.format("Debes ser mayor de 18 años"));


jQuery.validator.addMethod("no_mummy", function(value, element) {
    var pieces = value.split('-'),
        e = pieces[2],
        i = pieces[1],
        n = pieces[0],
        s = 99;
    var a = moment( [moment().get('Y'), moment().get('M'), moment().get('D')] ),
        b = moment( [n, i - 1, e] ),
        r = a.diff( b, 'years' );
    return r < s
}, jQuery.validator.format("El limite de edad es 99 años"));


jQuery.validator.addMethod('check_exist', (function(value, element) {
    var a, b, e, i, n, pieces, r, s;
    pieces = value.split('-');
    e = pieces[2];
    i = pieces[1];
    n = pieces[0];
    s = 0;
    a = moment([moment().get('Y'), moment().get('M'), moment().get('D')]);
    b = moment([n, i - 1, e]);
    r = a.diff(b, 'days');
    return r > s;
  }), jQuery.validator.format('Fecha inexistente'));


jQuery.validator.addMethod('valid_date', function(value, element) {
    var pieces = value.split('-');
    var y = pieces[0], m  = pieces[1], d = pieces[2];
    // Assume not leap year by default (note zero index for Jan)
    var daysInMonth = [31,28,31,30,31,30,31,31,30,31,30,31];

    // If evenly divisible by 4 and not evenly divisible by 100,
    // or is evenly divisible by 400, then a leap year
    if ( (!(y % 4) && y % 100) || !(y % 400)) {
        daysInMonth[1] = 29;
    }
    return d <= daysInMonth[--m]
}, jQuery.validator.format('La fecha es incorrecta'));


jQuery.validator.addMethod("nowspace_names", function(value, element) {
    return this.optional(element) || /^(?!\s).[a-zA-Z\u00C1\u00E1\u00C9\u00E9\u00CD\u00ED\u00D3\u00F3\u00DA\u00FA\u00D1\u00F1\s]/i.test(value);
}, "No white space please");


jQuery.validator.addMethod("nowspace", function(value, element) {
    return this.optional(element) || /^(?!\s).*$/i.test(value);
}, "No white space please");


jQuery.validator.addMethod("placeholder", function(value, element) {
    return value!=$(element).attr("placeholder");
}, jQuery.validator.messages.required);


jQuery.validator.addMethod("validEmail", function (value, element) {
   return this.optional(element) || /(^[-!#$%&'*+/=?^_`{}|~0-9A-Z]+(\.[-!#$%&'*+/=?^_`{}|~0-9A-Z]+)*|^"([\001-\010\013\014\016-\037!#-\[\]-\177]|\\[\001-\011\013\014\016-\177])*")@((?:[A-Z0-9](?:[A-Z0-9-]{0,61}[A-Z0-9])?\.)+(?:[A-Z]{2,6}\.?|[A-Z0-9-]{2,}\.?)$)|\[(25[0-5]|2[0-4]\d|[0-1]?\d?\d)(\.(25[0-5]|2[0-4]\d|[0-1]?\d?\d)){3}\]$/i.test(value);
}, 'Debe ingresar un email válido.');
