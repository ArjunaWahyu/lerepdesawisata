<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
                
		// setting for calendar
	 function _setting(){
	  return array(
	   'start_day'   => 'monday',
	   'show_next_prev'  => false,
	   'next_prev_url'  => site_url('index'),
	   'month_type'     => 'long',
	   'day_type'       => 'short',
	   'template'    => '{table_open}<table class="date">{/table_open}
	           {heading_row_start}&nbsp;{/heading_row_start}
	           {heading_previous_cell}<caption><a href="{previous_url}" class="prev_date" title="Previous Month">&lt;&lt;Prev</a>{/heading_previous_cell}
	           {heading_title_cell}<h5>{heading}</h5>{/heading_title_cell}
	           {heading_next_cell}<a href="{next_url}" class="next_date"  title="Next Month">Next&gt;&gt;</a></caption>{/heading_next_cell}
	           {heading_row_end}<col class="weekday" span="5"><col class="weekend_sat"><col class="weekend_sun">{/heading_row_end}
	           {week_row_start}<thead><tr>{/week_row_start}
	           {week_day_cell}<th>{week_day}</th>{/week_day_cell}
	           {week_row_end}</tr></thead><tbody>{/week_row_end}
	           {cal_row_start}<tr>{/cal_row_start}
	           {cal_cell_start}<td>{/cal_cell_start}
	           {cal_cell_content}<div class="date_event detail" val="{day}"><span class="date">{day}</span><span class="event d{day}">{content}</span></div>{/cal_cell_content}
	           {cal_cell_content_today}<div class="active_date_event detail" val="{day}"><span class="date">{day}</span><span class="event d{day}">{content}</span></div>{/cal_cell_content_today}
	           {cal_cell_no_content}<div class="no_event detail" val="{day}"><span class="date">{day}</span><span class="event d{day}">&nbsp;</span></div>{/cal_cell_no_content}
	           {cal_cell_no_content_today}<div class="active_no_event detail" val="{day}"><span class="date">{day}</span><span class="event d{day}">&nbsp;</span></div>{/cal_cell_no_content_today}
	           {cal_cell_blank}&nbsp;{/cal_cell_blank}
	           {cal_cell_end}</td>{/cal_cell_end}
	           {cal_row_end}</tr>{/cal_row_end}
	           {table_close}</tbody></table>{/table_close}');
	 }

	 function _month($month){
	  $month = (int) $month;
	  switch($month){
	   case 1 : $month = 'Januari'; Break;
	   case 2 : $month = 'Februari'; Break;
	   case 3 : $month = 'Maret'; Break;
	   case 4 : $month = 'April'; Break;
	   case 5 : $month = 'Mei'; Break;
	   case 6 : $month = 'Juni'; Break;
	   case 7 : $month = 'Juli'; Break;
	   case 8 : $month = 'Agustus'; Break;
	   case 9 : $month = 'September'; Break;
	   case 10 : $month = 'Oktober'; Break;
	   case 11 : $month = 'November'; Break;
	   case 12 : $month = 'Desember'; Break;
	  }
	  return $month;
	 }

/* End of file Setting.php */
/* Location: ./system/application/libraries/Setting.php */


