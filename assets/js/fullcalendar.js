// npm package: fullcalendar
// github link: https://github.com/fullcalendar/fullcalendar

'use strict';

(function () {

  const calendarEl = document.getElementById('fullcalendar');
  const containerEl = document.getElementById('external-events');
  const curYear = 2025;

  const calendarEvents = {
    id: 1,
    backgroundColor: 'rgb(255, 11, 11)',
    borderColor: 'rgb(255, 11, 11)',
    events: [
      {
        id: '1',
        start: `${curYear}-01-01T00:00:00`,
        end: `${curYear}-01-01T23:59:59`,
        title: 'Tahun Baru 2025 Masehi',
        description: 'Perayaan Tahun Baru Masehi.'
      },
      {
        id: '2',
        start: `${curYear}-01-27T00:00:00`,
        end: `${curYear}-01-27T23:59:59`,
        title: 'Isra Mikraj Nabi Muhammad SAW',
        description: 'Peringatan perjalanan spiritual Nabi Muhammad SAW.'
      },
      {
        id: '3',
        start: `${curYear}-01-29T00:00:00`,
        end: `${curYear}-01-29T23:59:59`,
        title: 'Tahun Baru Imlek 2576 Kongzili',
        description: 'Perayaan Tahun Baru Imlek.'
      },
      {
        id: '4',
        start: `${curYear}-03-29T00:00:00`,
        end: `${curYear}-03-29T23:59:59`,
        title: 'Hari Suci Nyepi (Tahun Baru Saka 1947)',
        description: 'Hari raya umat Hindu untuk introspeksi diri.'
      },
      {
        id: '5',
        start: `${curYear}-03-31T00:00:00`,
        end: `${curYear}-03-31T23:59:59`,
        title: 'Idul Fitri 1446 Hijriah (Hari Pertama)',
        description: 'Hari raya umat Islam setelah bulan Ramadan.'
      },
      {
        id: '6',
        start: `${curYear}-04-01T00:00:00`,
        end: `${curYear}-04-01T23:59:59`,
        title: 'Idul Fitri 1446 Hijriah (Hari Kedua)',
        description: 'Hari kedua perayaan Idul Fitri.'
      },
      {
        id: '7',
        start: `${curYear}-04-18T00:00:00`,
        end: `${curYear}-04-18T23:59:59`,
        title: 'Wafat Yesus Kristus',
        description: 'Peringatan wafatnya Yesus Kristus.'
      },
      {
        id: '8',
        start: `${curYear}-04-20T00:00:00`,
        end: `${curYear}-04-20T23:59:59`,
        title: 'Kebangkitan Yesus Kristus (Paskah)',
        description: 'Perayaan kebangkitan Yesus Kristus.'
      },
      {
        id: '9',
        start: `${curYear}-05-01T00:00:00`,
        end: `${curYear}-05-01T23:59:59`,
        title: 'Hari Buruh Internasional',
        description: 'Peringatan hari buruh sedunia.'
      },
      {
        id: '10',
        start: `${curYear}-05-12T00:00:00`,
        end: `${curYear}-05-12T23:59:59`,
        title: 'Hari Raya Waisak 2569 BE',
        description: 'Peringatan kelahiran, pencerahan, dan wafatnya Buddha.'
      },
      {
        id: '11',
        start: `${curYear}-05-29T00:00:00`,
        end: `${curYear}-05-29T23:59:59`,
        title: 'Kenaikan Yesus Kristus',
        description: 'Peringatan kenaikan Yesus Kristus ke surga.'
      },
      {
        id: '12',
        start: `${curYear}-06-01T00:00:00`,
        end: `${curYear}-06-01T23:59:59`,
        title: 'Hari Lahir Pancasila',
        description: 'Peringatan lahirnya dasar negara Indonesia.'
      },
      {
        id: '13',
        start: `${curYear}-06-06T00:00:00`,
        end: `${curYear}-06-06T23:59:59`,
        title: 'Idul Adha 1446 Hijriah',
        description: 'Hari raya kurban bagi umat Islam.'
      },
      {
        id: '14',
        start: `${curYear}-06-27T00:00:00`,
        end: `${curYear}-06-27T23:59:59`,
        title: '1 Muharam Tahun Baru Islam 1447 Hijriah',
        description: 'Peringatan tahun baru dalam kalender Islam.'
      },
      {
        id: '15',
        start: `${curYear}-08-17T00:00:00`,
        end: `${curYear}-08-17T23:59:59`,
        title: 'Proklamasi Kemerdekaan Indonesia',
        description: 'Peringatan Hari Kemerdekaan Republik Indonesia.'
      },
      {
        id: '16',
        start: `${curYear}-09-05T00:00:00`,
        end: `${curYear}-09-05T23:59:59`,
        title: 'Maulid Nabi Muhammad SAW',
        description: 'Peringatan hari kelahiran Nabi Muhammad SAW.'
      },
      {
        id: '17',
        start: `${curYear}-12-25T00:00:00`,
        end: `${curYear}-12-25T23:59:59`,
        title: 'Kelahiran Yesus Kristus (Hari Natal)',
        description: 'Perayaan kelahiran Yesus Kristus.'
      }
    ]
  };





  // initialize the calendar
  const calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
      left: "prev,today,next",
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
    },
    editable: false,
    droppable: false, // this allows things to be dropped onto the calendar
    fixedWeekCount: true,
    // height: 300,
    initialView: 'dayGridMonth',
    timeZone: 'UTC+07:00',
    hiddenDays: [],
    navLinks: 'true',
    // weekNumbers: true,
    // weekNumberFormat: {
    //   week:'numeric',
    // },
    dayMaxEvents: 2,
    events: [],
    eventSources: [calendarEvents],
    drop: function (info) {
      // remove the element from the "Draggable Events" list
      // info.draggedEl.parentNode.removeChild(info.draggedEl);
    },
    eventClick: function (info) {
      console.log(info);
      const eventObj = info.event;
      document.querySelector('#modalTitle1').innerHTML = eventObj.title;
      document.querySelector('#modalBody1').innerHTML = eventObj._def.extendedProps.description || '{ no description }';
      const fullCalModal = new bootstrap.Modal('#fullCalModal');
      fullCalModal.show();
    },
  });

  calendar.render();

})();