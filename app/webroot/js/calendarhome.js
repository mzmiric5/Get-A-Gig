$(document).ready(function() {
    $('#calendar').fullCalendar({
        events: [  
            {
                title  : 'Spoti-Friday @ The deaf institute',
                start  : '2012-04-27 17:00:00',
                end    : '2010-04-27 22:00:00',
                allDay : false
            },
            {
                title  : 'Clique @ The deaf institute',
                start  : '2012-04-27 22:00:00',
                end    : '2010-04-28 03:00:00',
                allDay : false
            },
            {
                title  : 'Nerdi @ The deaf institute',
                start  : '2012-04-28 19:30:00',
                end    : '2010-04-28 22:30:00',
                allDay : false
            }
        ]
    });
});