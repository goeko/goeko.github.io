var customer_survey = $('#customer_survey'),
    survey_form = $('.wsm-kundenumfrage').find( "form" ),
    survey_button = $('.csc-form-element-submit input');

$(document).ready(function() {
    /**
     * genQuetion
     * generate question with 6 Slots
     *
     * @param id
     * @param quest
     * @returns {string}
     */
    function genQuetion(id, quest){
        var output = '<div id="' +id+ '" class="question">\
            <label>' + quest + '</label>\
            <div><label for="' +id+'_1" data-slot="1"><input id="' +id+'_1" type="radio" name="' + id + '" value="1" required="required"/></label></div>\
            <div><label for="' +id+'_2" data-slot="2"><input id="' +id+'_2" type="radio" name="' + id + '" value="2" /></label></div>\
            <div><label for="' +id+'_3" data-slot="3"><input id="' +id+'_3" type="radio" name="' + id + '" value="3" /></label></div>\
            <div><label for="' +id+'_4" data-slot="4"><input id="' +id+'_4" type="radio" name="' + id + '" value="4" /></label></div>\
            <div><label for="' +id+'_5" data-slot="5"><input id="' +id+'_5" type="radio" name="' + id + '" value="5" /></label></div>\
            <div><label for="' +id+'_6" data-slot="6"><input id="' +id+'_6" type="radio" name="' + id + '" value="6" /></label></div>\
        </div>';

        return output;
    }

    if( customer_survey.length > 0){
        var markup = [];
        markup.push('<div class="question question_header">\
            <label>Bitte kreuzen Sie an:</label>\
            <div>Trifft voll zu<span>1</span></div>\
            <div>2</div>\
            <div>3</div>\
            <div>4</div>\
            <div>5</div>\
            <div>Trifft nicht zu<span>6</span></div>\
        </div>');

        markup.push('<h3>AKTUELLES AUS WIRTSCHAFT & POLITIK</h3>')
            markup.push(genQuetion('Wirtschaft_Politik__Die_Themen_sind_interessant', 'Die Themen sind interessant'))
            markup.push(genQuetion('Wirtschaft_Politik__Die_Inhalte_sind_nutzbringend', 'Die Inhalte sind nutzbringend'))
            markup.push(genQuetion('Wirtschaft_Politik__Die_Rubrik_koennte_gern_umfassender_sein', 'Die Rubrik könnte gern umfassender sein'))

        markup.push('<h3>AUS DER BRANCHE</h3>')
            markup.push(genQuetion('Aus_der_Branche__Die_Themen_sind_informativ', 'Die Themen sind informativ'))
            markup.push(genQuetion('Aus_der_Branche__Die_Inhalte_sind_nutzbringend', 'Die Inhalte sind nutzbringend'))
            markup.push(genQuetion('Aus_der_Branche__Die_Rubrik_koennte_gern_umfassender_sein', 'Die Rubrik könnte gern umfassender sein'))

        markup.push('<h3>WSM INTERN und NEUES AUS UNSEREM VERBÄNDENETZWERK</h3>')
            markup.push(genQuetion('WSM_Intern__Hier_erfahre_ich_Wichtiges_aus_der_Verbandsarbeit', 'Hier erfahre ich Wichtiges aus der Verbandsarbeit'))
            markup.push(genQuetion('WSM_Intern__Die_Inhalte_nuetzen_mir_bei_meiner_Arbeit', 'Die Inhalte nützen mir bei meiner Arbeit'))
            markup.push(genQuetion('WSM_Intern__Die_Rubriken_koennten_umfassender_sein', 'Die Rubriken könnten umfassender sein'))

        markup.push('<h3>FÜR DIE BETRIEBSPRAXIS</h3>')
            markup.push(genQuetion('Betriebspraxis__Die_Rubrik_ist_fuer_meine_Arbeit_hilfreich', 'Die Rubrik ist für meine Arbeit hilfreich'))
            markup.push(genQuetion('Betriebspraxis__Die_Rubrik_könnte_umfassender_sein', 'Die Rubrik könnte umfassender sein'))

        markup.push('<h3>Ich möchte die WSM Nachrichten nur noch online bekommen!</h3>')
            markup.push('<div class="question question_wsm_online">')
            markup.push('<div><label><input type="radio" name="WSM-Nachrichten-Online" value="Ja" required="required"><span>Ja</span></label></div>')
            markup.push('<div><label><input type="radio" name="WSM-Nachrichten-Online" value="Nein"><span>Nein</span></label></div>')
            markup.push('</div>')

        markup.push('<h3>Meine Verbesserungsvorschläge, zum Beispiel:</h3>')
            markup.push('<div class="question question_text">')
            markup.push('<label>Mir fehlt...., Entbehrlich finde ich..., Darüber würde ich gern mehr erfahren...</label>')
            markup.push('<textarea name="Mir-fehlt" cols="5"></textarea>')
            markup.push('</div>')


        customer_survey.html('<div class="survey_form">' + markup.join('') +'</div>');
        survey_form.attr('onsubmit', 'return window.send_survey()');


        // $('.question').find('input:first').attr('checked', 'checked');

        /**
         * window.send_survey
         *
         * @returns {boolean}
         */
        window.send_survey = function(){
            var survey_data = $('.wsm-kundenumfrage').find( "form" ).serializeArray(),
                out = [];

            survey_button.attr('type', 'button').css({
                opacity: 0.5
            });

            console.log("data", survey_data);

            for (var i=0; i < survey_data.length; i++){
                var el = survey_data[i];
                if (el['name'] !== "tx_form[data]") {
                    out.push(el['name'] + ' = ' + el['value']);
                }
            }

            console.log("out", out.join("\n"));

            $('input[type=hidden]').val( out.join("\n") );

            return true;
        }

    }
    

});