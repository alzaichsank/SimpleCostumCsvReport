<?php
// first call this function 
// add your prameter if needed
	    public function reportCsv($your_param1,$your_param2)
	    {	
	    	//get date data
			$date_now =date("Y-m-d H:i:s");
			$get_month = date('F');
			$get_year = date('Y');
			// set file name 
			$file_name = 'Report_csv'.' '.$date_now.'.csv';


			$path_to_write = FCPATH.'report_csv/';
			$this->load->helper('file');
			$this->load->dbutil();
			// create csv with format you want ( add prameter if needed )

			write_file($path_to_write.$file_name,$this->csv_format(",","\n",'"',$your_param1,$your_param2));
			
			//set the path exmaple : yourlink_example.com/reportcsvprogram/report_csv/
	    	$fix_file = 'yourlink_example.com/yourpath1/..yourpathN/report_csv/'.$file_name;

			return $fix;
	    }

	    //template function
	    /*
			$delim = , 
			$$newline = \n
			$enclosure = "	
			

	    */

	    function csv_format($delim,$newline,$enclosure,$your_param1,$your_param2) {
	    
			$date_now =date("Y-m-d H:i:s");

			// set your query and add initialization for call on template
			//example query:
			$query = $this->db->query(
				"
				SELECT
				(id) as id,

				(user) as user,
			
				
				(content) as content,
				
				(date) as date
				
				FROM report
				"
				
			);

			//get result
			$data = $query->result();


			$out = '';
			$out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, "").$enclosure.$delim;
			$out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, "").$enclosure.$delim;
			$out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, "").$enclosure.$delim;
			$out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, "").$enclosure.$delim;
			$out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, "Report csv"." ").$enclosure.$delim;
			$out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, "").$enclosure.$delim;
			$out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, "").$enclosure.$delim;
			$out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, "").$enclosure.$delim;
			$out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, "").$enclosure.$delim;
			$out = rtrim($out);
			$out .= $newline;
			$out .= $newline;
			$out .= $newline;
			$out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, "Id").$enclosure.$delim;
			$out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, "User").$enclosure.$delim;
			$out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, "Content").$enclosure.$delim;
			$out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, "Date").$enclosure.$delim;
			$out = rtrim($out);
			$out .= $newline;
			$reward_data='';
			$total_hours='';
			$total_reward='';
			
			for($i = 0; $i < count($data); $i++){

				$out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, $i).$enclosure.$delim;
				$out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, $data[$i]->Id).$enclosure.$delim;
				$out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, $data[$i]->user).$enclosure.$delim;
				$out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, $data[$i]->content).$enclosure.$delim;
				$out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, $data[$i]->date).$enclosure.$delim;
				$out .= $newline;
			
			}
			
				
			$out .= $newline;
			$out .= $newline;
			$out .= $newline;
			$out .= $newline;
			$out .= $newline;
			$out .= $newline;
			$out .= $newline;
			$out .= $newline;
			$out .= $newline;
			$out .= $newline;
			$out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, "").$enclosure.$delim;
			$out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, "").$enclosure.$delim;
			$out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, "").$enclosure.$delim;
			$out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, "").$enclosure.$delim;
			$out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, "Your tag if want lol").$enclosure.$delim;
			
	
			return $out;
		}

		//# created by Alza 2018
?>