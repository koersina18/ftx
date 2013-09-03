var fuzzyFacebookTime = (function(){

  fuzzyTime.defaultOptions={
    // time display options
    relativeTime : 48,
    // language options
    monthNames : ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    amPm : ['AM', 'PM'],
    ordinalSuffix : function(n) {return ['th','st','nd','rd'][n<4 || (n>20 && n % 10<4) ? n % 10 : 0]}
  }

  function fuzzyTime (timeValue, options) {

    var options=options||fuzzyTime.defaultOptions, 
        date=parseDate(timeValue),
        delta=parseInt(((new Date()).getTime()-date.getTime())/1000),
        relative=options.relativeTime,
        cutoff=+relative===relative ? relative*60*60 : Infinity;

    if (relative===false || delta>cutoff)
      return formatTime(date, options)+' '+formatDate(date, options);

    if (delta<60) return 'less than a minute ago';
    var minutes=parseInt(delta/60 +0.5);
    if (minutes <= 1) return 'about a minute ago';
    var hours=parseInt(minutes/60 +0.5);
    if (hours<1) return minutes+' minutes ago';
    if (hours==1) return 'about an hour ago';
    var days=parseInt(hours/24 +0.5);
    if (days<1) return hours+' hours ago';
    if (days==1) return formatTime(date, options)+' yesterday';
    var weeks=parseInt(days/7 +0.5);
    if (weeks<2) return formatTime(date, options)+' '+days+' days ago';
    var months=parseInt(weeks/4.34812141 +0.5);
    if (months<2) return weeks+' weeks ago';
    var years=parseInt(months/12 +0.5);
    if (years<2) return months+' months ago';
    return years+' years ago';
  }

  function parseDate (str) {
    var v=str.replace(/[T\+]/g,' ').split(' ');
    return new Date(Date.parse(v[0] + " " + v[1] + " UTC"));
  }

  function formatTime (date, options) {
    var h=date.getHours(), m=''+date.getMinutes(), am=options.amPm;
    return (h>12 ? h-12 : h)+':'+(m.length==1 ? '0' : '' )+m+' '+(h<12 ? am[0] : am[1]);
  }

  function formatDate (date, options) {
    var mon=options.monthNames[date.getMonth()],
        day=date.getDate(),
        year=date.getFullYear(),
        thisyear=(new Date()).getFullYear(),
        suf=options.ordinalSuffix(day);

    return mon+' '+day+suf+(thisyear!=year ? ', '+year : '');
  }

  return fuzzyTime;

}());


var K = function () {
    var a = navigator.userAgent;
    return {
        ie: a.match(/MSIE\s([^;]*)/)
    }
}();
 
var H = function (a) {
    var b = new Date();
    var c = new Date(a);
    if (K.ie) {
        c = Date.parse(a.replace(/( \+)/, ' UTC$1'))
    }
    var d = b - c;
    var e = 1000,
        minute = e * 60,
        hour = minute * 60,
        day = hour * 24,
        week = day * 7;
    if (isNaN(d) || d < 0) {
        return ""
    }
    if (d < e * 7) {
        return "right now"
    }
    if (d < minute) {
        return Math.floor(d / e) + " seconds ago"
    }
    if (d < minute * 2) {
        return "about 1 minute ago"
    }
    if (d < hour) {
        return Math.floor(d / minute) + " minutes ago"
    }
    if (d < hour * 2) {
        return "about 1 hour ago"
    }
    if (d < day) {
        return Math.floor(d / hour) + " hours ago"
    }
    if (d > day && d < day * 2) {
        return "yesterday"
    }
    if (d < day * 365) {
        return Math.floor(d / day) + " days ago"
    } else {
        return "over a year ago"
    }
};
function htmlspecialchars_decode (string, quote_style) {
    // http://kevin.vanzonneveld.net
    // +   original by: Mirek Slugen
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   bugfixed by: Mateusz "loonquawl" Zalega
    // +      input by: ReverseSyntax
    // +      input by: Slawomir Kaniecki
    // +      input by: Scott Cariss
    // +      input by: Francois
    // +   bugfixed by: Onno Marsman
    // +    revised by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   bugfixed by: Brett Zamir (http://brett-zamir.me)
    // +      input by: Ratheous
    // +      input by: Mailfaker (http://www.weedem.fr/)
    // +      reimplemented by: Brett Zamir (http://brett-zamir.me)
    // +    bugfixed by: Brett Zamir (http://brett-zamir.me)
    // *     example 1: htmlspecialchars_decode("<p>this -&gt; &quot;</p>", 'ENT_NOQUOTES');
    // *     returns 1: '<p>this -> &quot;</p>'
    // *     example 2: htmlspecialchars_decode("&amp;quot;");
    // *     returns 2: '&quot;'
    var optTemp = 0,
        i = 0,
        noquotes = false;
    if (typeof quote_style === 'undefined') {
        quote_style = 2;
    }
    string = string.toString().replace(/&lt;/g, '<').replace(/&gt;/g, '>');
    var OPTS = {
        'ENT_NOQUOTES': 0,
        'ENT_HTML_QUOTE_SINGLE': 1,
        'ENT_HTML_QUOTE_DOUBLE': 2,
        'ENT_COMPAT': 2,
        'ENT_QUOTES': 3,
        'ENT_IGNORE': 4
    };
    if (quote_style === 0) {
        noquotes = true;
    }
    if (typeof quote_style !== 'number') { // Allow for a single string or an array of string flags
        quote_style = [].concat(quote_style);
        for (i = 0; i < quote_style.length; i++) {
            // Resolve string input to bitwise e.g. 'PATHINFO_EXTENSION' becomes 4
            if (OPTS[quote_style[i]] === 0) {
                noquotes = true;
            } else if (OPTS[quote_style[i]]) {
                optTemp = optTemp | OPTS[quote_style[i]];
            }
        }
        quote_style = optTemp;
    }
    if (quote_style & OPTS.ENT_HTML_QUOTE_SINGLE) {
        string = string.replace(/&#0*39;/g, "'"); // PHP doesn't currently escape if more than one 0, but it should
        // string = string.replace(/&apos;|&#x0*27;/g, "'"); // This would also be useful here, but not a part of PHP
    }
    if (!noquotes) {
        string = string.replace(/&quot;/g, '"');
    }
    // Put this in last place to avoid escape being double-decoded
    string = string.replace(/&amp;/g, '&');

    return string;
}