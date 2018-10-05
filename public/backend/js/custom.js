;(function () {	
	'use strict';	
	//enable disable field on different events
	var trigger_ = function()
	{
		//$('#proof').click();		$(window).load(function(){			//console.log($('#calendar_dropdown').find('.slimScrollDiv:first'));			$('#calendar_dropdown').find('.slimScrollDiv:first').addClass('cal_drp_tab');			$('#calendar_dropdown').find('.cal_drp_tab').removeClass('slimScrollDiv');		})						
		var fixed_term_mnt = 0;		var ftc_flsg = 0;		var perm_flsg = 0;		$('#pay_dsr_anul_pop').attr('disabled','disabled');		
		$('body').on('click', '.display_none_talent3', function()
		{
			var row_class_ = $(this).parent().parent().attr('class');
			var click_id  = $(this).attr('id');
			console.log(row_class_);
			if(row_class_ == 'level' || row_class_ == 'bonus-by-out' || row_class_ == 'experience' || row_class_ == 'successor-ready' || row_class_ == 'qualification' || row_class_ == 'flexible-working'  || row_class_ == 'capability' || row_class_ == 'benefits' || row_class_ == 'job' || row_class_ == 'current_search_1' || row_class_ == 'notice_period' || row_class_ == 'people_ambitions' || row_class_ == 'home_require' || row_class_ == 'flexible_hours' || row_class_ == 'people_manage' || row_class_ == 'hours_option' || row_class_ == 'contract' || row_class_ == 'hm_availibility_new')
			{
				singleSelect_(row_class_,$(this));
			}
			if(row_class_ == 'bonus')
			{
				if(click_id == 'None')
				{
					$('#Yes').prop('checked',false);
					$('#None').prop('checked',true);
					$('#percent').attr('disabled','disabled');
					$('.bonus-by-out').find("input:checkbox").each(function()
					{
						$(this).prop('checked',false);
						$(this).attr('disabled','disabled');
					});
				}
				else if(click_id == 'Yes')
				{
					$('#Yes').prop('checked',true);
					$('#None').prop('checked',false);
					$('#percent').removeAttr('disabled');
					$('.bonus-by-out').find("input:checkbox").each(function()
					{
						$(this).removeAttr('disabled','disabled');
					});
				}
			}			if(row_class_ == 'benefits')			{				if(click_id == 'Car_allowance' && $('#Car_allowance01').prop('checked')==true)				{					$('#Some4').prop('Car_allowance01',false);				}				if(click_id == 'Car_allowance01' && $('#Car_allowance').prop('checked')==true)				{					$('#Some4').prop('Car_allowance',false);				}			}		
			if(row_class_ == 'contract')
			{				if(click_id == 'ftc'){					return false;				}
				if(click_id == 'perm' && $('#perm').prop('checked')==true)
				{										//Abo Baker Saddique					//$('#ftc').prop('selected',false);					$('#ftc').prop('selectedIndex',0);					$('#ftc').removeAttr('style','style');					//$('#contractor_thrd_').prop('selected',false);					$('#contractor_thrd_').prop('selectedIndex',0);					$('#contractor_thrd_').removeAttr('style','style');					//Abo Baker Saddique															//$('#pay_frst_drp').removeAttr('disabled','disabled');					//$('#pay_sec_drp').removeAttr('disabled','disabled');
					$('#fixed_term_mnt').attr('disabled','disabled');					//$('#proof01031').removeAttr('disabled','disabled');
					perm_flsg = 1;					fixed_term_mnt = 1;
				}
				else
				{
					$('#perm').prop('checked',false);
					$('#fixed_term_mnt').removeAttr('disabled','disabled');						//$('#pay_sec_drp').attr('disabled','disabled');					if(ftc_flsg){}else{						//$('#pay_frst_drp').attr('disabled','disabled');
						//$('#proof01031').attr('disabled','disabled');					}					fixed_term_mnt = 0;					perm_flsg = 0;				
				}
				//console.log(fixed_term_mnt);
				//enadis_val_(fixed_term_mnt);
			}						if(row_class_ == 'current_contract')			{				if(click_id == 'proof41' && $('#proof41').prop('checked')==true){					$('.current_contr_thrd_pop').prop('selectedIndex',0);				}			}			if(row_class_ == 'contract-consider-pop')			{				if(click_id == 'proof51' && $('#proof51').prop('checked')==true || click_id == 'proof52' && $('#proof52').prop('checked')==true){					$('#pay_dsr_anul_pop').removeAttr('disabled','disabled');					}				else				{					$('#pay_dsr_anul_pop').attr('disabled','disabled');					}			}						if(row_class_ == 'relocation-support')			{				if(click_id == 'None4' && $('#None4').prop('checked')==true){										$('#Some4').prop('checked',false);					$('#Significant').prop('checked',false);				}				if(click_id == 'Some4' && $('#None4').prop('checked')==true || click_id == 'Significant' && $('#None4').prop('checked')==true ){					$('#None4').prop('checked',false);				}			}			
		});
				$('body').on('change', '.current_contr_thrd_pop', function()		{			if($('#proof41').prop('checked')==true)			{				$('#proof41').prop('checked',false);			}			if($(this).val())			{				console.log($(".pay > #pay_frst_drp option:first-child").val());				$(".curny-pay-dly option:first").text('Daily');				$('#curny_pay_lastpid').attr('disabled','disabled');				$('.curny_pay_beneft').css("pointer-events","none");							}			else			{				$('#curny_pay_lastpid').removeAttr('disabled','disabled');				$('.curny_pay_beneft').css("pointer-events","");				$(".curny-pay-dly option:first").text('Annual');			}		});		
		$('body').on('change', '#fixed_term_mnt', function()
		{
			if($(this).val())
			{
				fixed_term_mnt = 1;
				$('#perm').attr('disabled','disabled');
			}
			else
			{
				fixed_term_mnt = 0;
				//$('#pay_frst_drp').removeAttr('disabled','disabled');
				$('#perm').removeAttr('disabled','disabled');
			}
			console.log(fixed_term_mnt);
			enadis_val_(fixed_term_mnt);
		});				//$('#proof01031').attr('disabled','disabled');		$('#pay_sec_drp').attr('disabled','disabled');		
		$('body').on('change', '#contractor_thrd_', function()
		{			//Abo baker Saddique			$('#perm').prop('checked',false);			//$('#ftc').prop('selected',false);			$('#ftc').prop('selectedIndex',0);			$('#ftc').removeAttr('style');			//Abo baker Saddique						
			if($(this).val())
			{				if(ftc_flsg)				{					//$('#pay_frst_drp').prop('selectedIndex',0);				}				//$('#proof01031').removeAttr('disabled','disabled');
				$('#pay_sec_drp').removeAttr('disabled','disabled');
			}
			else
			{				//if(ftc_flsg || perm_flsg){}else{					//$('#proof01031').attr('disabled','disabled');					$('#pay_sec_drp').attr('disabled','disabled');
				//}
			}
		});								$('#days_worked').attr('disabled','disabled');		$('#hours_al_day').attr('disabled','disabled');		$('.cursr-evnt').next().children().siblings('button').html('All Days <i class="fa fa-caret-down" aria-hidden="true"></i>');		$('.cursr-evnt-job-popup').next().children().siblings('button').html('All Days <i class="fa fa-caret-down" aria-hidden="true"></i>');				$('body').on('change', '#part_time', function()		{			if($(this).val())			{				$('#hours_al_day').removeAttr('disabled','disabled');				//$('.cursr-evnt').next().children().siblings('button').css("pointer-events","");				$('#hours_al_day').prop('checked',true);				$('#days_worked').removeAttr('disabled','disabled');			}			else			{				$('#hours_al_day').prop('checked',false);				//$('.cursr-evnt').next().children().siblings('button').css("pointer-events","none");				$('#days_worked').attr('disabled','disabled');				$('#hours_al_day').attr('disabled','disabled');			}		});		$('body').on('change', '#ftc', function()		{						//Abo Baker Saddique			$('#perm').prop('checked',false);			//$('#contractor_thrd_').prop('selected',false);			$('#contractor_thrd_').prop('selectedIndex',0);			$('#contractor_thrd_').removeAttr('style');			//Abo Baker Saddique									if($(this).val())			{				ftc_flsg = 1;								//$('#pay_frst_drp').removeAttr('disabled','disabled');				//$('#proof01031').removeAttr('disabled','disabled');			}			else			{				ftc_flsg = 0;				//$('#pay_frst_drp').prop('selectedIndex',0);				if(ftc_flsg || perm_flsg){}else{					//$('#pay_frst_drp').attr('disabled','disabled');				}				//$('#proof01031').attr('disabled','disabled');			}		});		$('body').on('change', '#people_led_exp_pop', function()		{			if($(this).val() == 'none')			{				$('#people_led_tdts_pop').attr('disabled','disabled');			}			else			{				$('#people_led_tdts_pop').removeAttr('disabled','disabled');			}		});										
	};
	var enadis_val_= function(flag)
	{
		if(flag)
		{
			$('#pay_thrd_drp').removeAttr('disabled','disabled');	
			//$('#pay_frst_drp').removeAttr('disabled','disabled');	
		}
		else
		{
			$('#pay_thrd_drp').attr('disabled','disabled');
			//$('#pay_frst_drp').attr('disabled','disabled');
		}
	};
	
	var singleSelect_ = function(row_class_,this_)
	{	
		$('.'+row_class_).find("input:checkbox").each(function()
		{
			if ($(this).prop('checked')==true)
			{ 
				$(this).prop('checked',false);
				this_.prop('checked',true);
			}
		});
	};
	var payleft_ = function()
	{	
		$('.pay').find("select,input").each(function()
		{
			//$(this).attr('disabled','disabled');
		});
	};		var monthsList_ = function()	{		var theMonths = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");		var today = new Date();		var aMonth = today.getMonth();		var i;		var html = '';		for (i=0; i<12; i++) 		{			//document.writeln(theMonths[aMonth] + '<br>');			html = '<option value="'+theMonths[aMonth]+'">FTC - '+theMonths[aMonth]+'</option>';			$('#current_contr_ftc_pop').append(html);			$('.current_contr_thrd_pop').append('<option value="'+theMonths[aMonth]+'">Contractor - '+theMonths[aMonth]+'</option>');			aMonth++;			if (aMonth > 11) 			{				aMonth = 0;			}		}	}
	
	$(function()
	{
		trigger_();
		singleSelect_();
		payleft_();
		enadis_val_();		monthsList_();
	});
}());