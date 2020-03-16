let $doctor, $date, $specialty, $hours;
let iRadio;
const noHorasAlert = `<div class="alert alert-success" role="alert">
<strong>Lo sentimos !</strong> No existen Horas de atencion para el medico seleccionado
</div>`;
        $(function (){
            $specialty = $('#specialty');
            $doctor = $('#doctor');
            $date = $('#date');
            $hours = $('#hours');

            $specialty.change(()=>{
            const specialtyId = $specialty.val();
            const url = `/specialties/${specialtyId}/doctors`;
            $.getJSON(url, onDoctorsLoad);
             });
            
            $doctor.change(cargarHoras);
            $date.change(cargarHoras);

        });
        
        function onDoctorsLoad(doctors){
            let htmlOptions = '';
           doctors.forEach(doctor => {
               //console.log(`${doctor.id} - ${doctor.name} `);
               htmlOptions += `<option value="${doctor.id}">${doctor.name}</option>`;
           });
           $doctor.html(htmlOptions);
           cargarHoras();
        }


        function cargarHoras()
        {
            const selectedDate = $date.val();
            const doctorId = $doctor.val();

            const url = `/calendario/horas?date=${selectedDate}&doctor_id=${doctorId}`;
            $.getJSON(url, deplegarHoras);
        }

        function deplegarHoras(data)
        {
            if(!data.morning && !data.afternoon)
            {
                $hours.html(noHorasAlert);
                return;

            }
            let htmlHoras = '';
            iRadio = 0;
            //console.log(data);
            if(data.morning)
            {
                const morning_intervals = data.morning;
                morning_intervals.forEach(interval =>{
                    htmlHoras += getRadioIntervalHtml(interval);
                });
            }
            if(data.afternoon)
            {
                const afternoon_intervals = data.afternoon;
                afternoon_intervals.forEach(interval =>{
                    htmlHoras += getRadioIntervalHtml(interval) ;
                });
            }
            $hours.html(htmlHoras);
        }


        function getRadioIntervalHtml(interval)
        {
            const text =  `${interval.start} - ${interval.end}`;
            return `<div class="custom-control custom-radio mb-3">
            <input type="radio" id="interval${iRadio}" name="scheduled_time" value="${interval.start}" class="custom-control-input"  required>
            <label class="custom-control-label" for="interval${iRadio++}">${text}</label>
          </div>`;

        }

        





