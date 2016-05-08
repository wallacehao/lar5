<?php 
	function menuMulti($data,$parent_id = 0,$str="---|",$select=0) {
		foreach ($data as  $value) {
			$id   		= $value['id'];
			$name 		= $value['name'];
			if ( $value["parent_id"] == $parent_id) {
				if ($select!=0 &&  $id == $select) {
					echo '<option selected="selected" value="'.$id.'">'.$str.' '.$name.'</option>';
				} else {
					echo '<option value="'.$id.'">'.$str.' '.$name.'</option>';
				}
				menuMulti($data, $id, $str." ---|",$select);
			}
		}
	}

	function listCate($data, $parent_id=0, $str="",$stt=0) {
		foreach ($data as $value) {
			$id   = $value['id'];
			$name = $value['name'];
			if ($value["parent_id"] == $parent_id) {
				$stt++;
				echo 
				'<tr>
	                <td class="list_td" align="center">'.$stt.'</td>';
	                if ($str == "") {
	                	echo '<td class="list_td" align="left"><strong>'.$str.'&nbsp;'.$value['name'].'</strong></td>';
	                } else {
	                	echo '<td class="list_td" align="left">'.$str.'&nbsp;'.$value['name'].'</td>';
	                }
	                echo 
	                '<td class="list_td" align="center">
	                	<a href="edit/'.$value['id'].'">
	                		<img src="'.asset("public/assets/qt64_template/images/edit.png").'" />
	                	</a>
	                </td>
	                <td class="list_td" align="center">
	                	<a href="delete/'.$value['id'].'" onclick="return ConfirmMess(\' Are you sure to delete this cate ? \')">
	                		<img src="'.asset("public/assets/qt64_template/images/delete.png").'" />
	                	</a>
	                </td>
	            </tr>';
	            listCate($data, $id, $str." ---|",$stt);
			}
		}
	}

	function subMenu($data,$parent_id = 1) {
		$html = '';
		foreach ($data as $key => $value) {
			$id 	= $value['id'];
			$slug	= $value['slug'];
			if ($value["parent_id"] == $parent_id) {
				$html.='<li><a href="'.route('cate',['id'=>$id, 'alias'=>$slug]).'">'.$value['name'].'</a>';
					$sub = subMenu($data,$id);
					if ($sub!='<li></li>') {
						$html.= '<ul>';
						$html.= $sub;
						$html.= '</ul>';
					}
				$html.='</li>';
			}
		}
		return $html;
	}
?>