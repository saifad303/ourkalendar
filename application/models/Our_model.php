<?php

defined('BASEPATH') OR exit('No direct script access allowed');


defined('BASEPATH') OR exit('No direct script access allowed');

class Our_model extends CI_Model
{

    private $am;
    public $Id;

    public function home_page($start, $per_page)
    {
        return $this->GetMultipleQueryResult("CALL home_page($start, $per_page)");
    }

    public function books_pagination($start, $per_page)
    {
        return $this->GetMultipleQueryResult("CALL books_pageinate($start, $per_page)");
    }

    public function user_pagination($start, $per_page)
    {
        return $this->GetMultipleQueryResult("CALL user_pageinate($start, $per_page)");
    }

    public function book_details($id)
    {
        return $this->GetMultipleQueryResult("CALL book_details($id)");
    }

    public function browse_page($start, $per_page)
    {
        return $this->GetMultipleQueryResult("CALL browse_page($start, $per_page)");
    }

    public function InsertData($table, $data)
    {
        if ($this->db->insert($table, $data))
        {
            $this->Id = $this->db->insert_id();
            return true;
        }
        else
        {
            return false;
        }
    }

    public function getEventsList($page)
    {
        $offset = 5 * $page;
        $limit = 5;
        $sql = "select * from events limit $offset ,$limit";
        $result = $this->db->query($sql)->result();
        return $result;
    }

    public function view_subcategory()
    {
        $this->db->select("sca.id, sca.name, cg.name cgname");
        $this->db->from("subcategory sca");
        $this->db->join("category cg", "cg.id=sca.categoryid");
        $this->db->order_by("sca.id", "desc");
        $this->db->group_by("sca.id");
        return $this->db->get()->result();
    }

    public function view_book($where)
    {
        if ($where)
        {
            $this->db->where($where);
        }
        $this->db->select("b.id, b.title, b.author, b.publisher, b.publishingdate, b.picture, b.datetime, sc.name scname, c.name cname");
        $this->db->from("books b");
        $this->db->join("subcategory sc", "sc.id = b.subcategoryid");
        $this->db->join("category c", "c.id = sc.categoryid");
        $this->db->order_by("b.id", "desc");
        $this->db->group_by("b.id");
        return $this->db->get()->result();
    }

    public function view_notification()
    {
        $this->db->select("p.id, p.transferid, p.taka, p.paymentdate, p.userid, p.bankid,p.duration,u.id uid, u.name uname,u.picture upic,u.email uemail,cnt.name cntname, pm.bank_name pmname");
        $this->db->from("pay4mem p");
        $this->db->join("user u", "u.id = p.userid");
        $this->db->join("paymentmethod pm", "pm.id = p.bankid");
        $this->db->join("country cnt", "cnt.id = u.countryid");
        $this->db->order_by("p.id", "desc");
        $this->db->group_by("p.id");
        return $this->db->get()->result();
    }

    public function view_city()
    {
        $this->db->select("ct.id,ct.city_name,ct.countryid,cnt.id cntid,cnt.country_name cntname");
        $this->db->from("cities ct");
        $this->db->join("countries cnt", "cnt.id = ct.countryid");
        $this->db->order_by("ct.id", "desc");
        $this->db->group_by("ct.id");
        return $this->db->get()->result();
    }

    public function view_subtypes()
    {
        $this->db->select("bs.id,bs.subtype_name,bs.typeid,bt.id btid,bt.type_name btname");
        $this->db->from("business_subtypes bs");
        $this->db->join("business_types bt", "bt.id = bs.typeid");
        $this->db->order_by("bs.id", "desc");
        $this->db->group_by("bs.id");
        return $this->db->get()->result();
    }

    public function PendingEventList()
    {
        $this->db->select("ev.id,ev.title,ev.user_type,ev.activation,ev.editActivation,cat.id catid,cat.category_name catname");
        $this->db->from("events ev");
        $this->db->join("category cat", "cat.id = ev.categoryid");
        $this->db->order_by("ev.id", "desc");
        $this->db->group_by("ev.id");
        return $this->db->get()->result();
    }

    public function PendingEditEventList()
    {
        $this->db->select("ev.id,ev.title,ev.user_type,ev.activation,ev.editActivation,cat.id catid,cat.category_name catname");
        $this->db->from("events ev");
        $this->db->join("category cat", "cat.id = ev.categoryid");
        $this->db->order_by("ev.id", "desc");
        $this->db->group_by("ev.id");
        return $this->db->get()->result();
    }

    public function EventList()
    {
        $this->db->select("ev.id,ev.title,ev.userid,ev.user_type,ev.activation,ev.editActivation,cat.id catid,cat.category_name catname");
        $this->db->from("events ev");
        $this->db->join("category cat", "cat.id = ev.categoryid");
        $this->db->order_by("ev.id", "desc");
        $this->db->group_by("ev.id");
        return $this->db->get()->result();
    }

    public function search_user($name)
    {
        $this->db->select("u.id, u.name, u.email,u.type,u.activeorinactive");
        $this->db->from("users u");
        $this->db->order_by("u.id", "desc");
        if ($name != "")
        {
            $this->db->like("u.name", $name);
            $this->db->or_like("u.email", $name);
        }

        $this->db->group_by("u.id");
        return $this->db->get()->result();
    }

    public function business_user($name)
    {
        $this->db->select("u.id, u.business_title, u.email,u.type,u.activeorinactive");
        $this->db->from("business u");
        $this->db->order_by("u.id", "desc");
        if ($name != "")
        {
            $this->db->like("u.business_title", $name);
            $this->db->or_like("u.email", $name);
        }

        $this->db->group_by("u.id");
        return $this->db->get()->result();
    }

    public function event_search_admin($name)
    {
        $this->db->select("u.*");
        $this->db->from("events u");
        $this->db->order_by("u.id", "desc");
        if ($name != "")
        {
            $this->db->like("u.title", $name);
        }

        $this->db->group_by("u.id");
        return $this->db->get()->result();
    }

    public function search_email($title)
    {
        $this->db->select("u.id, u.name, u.email,u.type,u.picture, u.activation,u.datetime,u.countryid, cnt.name cntname");
        $this->db->from("user u");
        $this->db->join("country cnt", "cnt.id = u.countryid");
        $this->db->order_by("u.id", "desc");
        if ($title != "")
        {
            $this->db->like("u.email", $title);
        }

        $this->db->group_by("u.id");
        return $this->db->get()->result();
    }

    public function search_country($title)
    {
        $this->db->select("cnt.id,cnt.name,u.id uid,u.name uname,u.email uemail,u.countryid ucntid,u.type utype,u.activation uactive,u.datetime udate,u.picture upic");
        $this->db->from("country cnt");
        $this->db->join("user u", "u.countryid = cnt.id");
        $this->db->order_by("u.id", "desc");
        if ($title != "")
        {
            $this->db->like("cnt.name", $title);
        }

        $this->db->group_by("cnt.id");
        return $this->db->get()->result();
    }

    public function search_author($title)
    {
        $this->db->select("b.id, b.title, b.author, b.publisher, b.publishingdate, b.picture, b.datetime, sc.name scname, c.name cname");
        $this->db->from("books b");
        $this->db->join("subcategory sc", "sc.id = b.subcategoryid");
        $this->db->join("category c", "c.id = sc.categoryid");
        $this->db->order_by("b.id", "desc");
        if ($title != "")
        {
            $this->db->like("b.author", $title);
        }

        $this->db->group_by("b.id");
        return $this->db->get()->result();
    }

    public function search_publisher($title)
    {
        $this->db->select("b.id, b.title, b.author, b.publisher, b.publishingdate, b.picture, b.datetime, sc.name scname, c.name cname");
        $this->db->from("books b");
        $this->db->join("subcategory sc", "sc.id = b.subcategoryid");
        $this->db->join("category c", "c.id = sc.categoryid");
        $this->db->order_by("b.id", "desc");
        if ($title != "")
        {
            $this->db->like("b.publisher", $title);
        }

        $this->db->group_by("b.id");
        return $this->db->get()->result();
    }

    public function event_search_bytitle($query, $limit, $offset, $where1, $where2, $where3)
    {
        $this->db->select("e.*,");
        $this->db->from("events e");
        $this->db->where($where1);
        $this->db->where($where2);
        $this->db->where($where3);
        $this->db->order_by("e.startDate", "desc");
        if ($query != "")
        {
            $this->db->like("e.title", $query);
            $this->db->or_like("e.tags", $query);
            $this->db->limit($limit, $offset);
        }
        $this->db->group_by("e.id");
        return $this->db->get()->result();
    }

    public function event_search_bydate($query, $limit, $offset)
    {
        $this->db->select("e.*,");
        $this->db->from("events e");
        $this->db->order_by("e.id", "desc");
        if ($query != "")
        {
            $this->db->like("e.startDate", $query);
            $this->db->limit($limit, $offset);
        }
        $this->db->group_by("e.id");
        return $this->db->get()->result();
    }

    public function count_search_results($query, $where)
    {
        $q = $this->db->from("events")
                ->where($where)
                ->like("title", $query)
                ->or_like("tags", $query)
                ->get();

        return $q->num_rows();
    }

    public function count_pending_events($where)
    {
        $q = $this->db->from("events")
                ->where($where)
                ->get();

        return $q->num_rows();
    }

    public function count_allEvents($where1, $where2)
    {
        $q = $this->db->from("events")
                ->where($where1)
                ->where($where2)
                ->get();

        return $q->num_rows();
    }

    public function count_active_events($where1, $where2, $where3)
    {
        $q = $this->db->from("events")
                ->where($where1)
                ->where($where2)
                ->where($where3)
                ->get();

        return $q->num_rows();
    }

    public function all_pending_event_pagination($limit, $offset)
    {
        $this->db->select("*");
        $this->db->from("events");
        $this->db->where("activation", 0);
        $this->db->order_by("id", "desc");
        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }

    public function all_edit_pending_event_pagination($limit, $offset)
    {
        $this->db->select("*");
        $this->db->from("events");
        $this->db->where("editActivation", 0);
        $this->db->order_by("id", "desc");
        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }

    public function count_search_results_dates($query)
    {
        $q = $this->db->from("events")
                ->like("startDate", $query)
                ->get();

        return $q->num_rows();
    }

    public function count_filterResultForOneQuery($where, $where1, $where2, $where3)
    {
        $q = $this->db->from("events")
                ->where($where)
                ->where($where1)
                ->where($where2)
                ->where($where3)
                ->get();

        return $q->num_rows();
    }

    public function count_userList()
    {
        $q = $this->db->from("users")
                ->get();

        return $q->num_rows();
    }

    public function count_businessList()
    {
        $q = $this->db->from("business")
                ->get();

        return $q->num_rows();
    }

    public function filterResultForOneQuery_pagination($limit, $offset, $where, $where1, $where2, $where3)
    {
        $this->db->select("*");
        $this->db->from("events");
        $this->db->where($where);
        $this->db->where($where1);
        $this->db->where($where2);
        $this->db->where($where3);
        $this->db->order_by("startDate", "desc");
        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }

    public function count_filterResultForTwoQuery($where1, $where2, $where3, $where4, $where5)
    {
        $q = $this->db->from("events")
                ->where($where1)
                ->where($where2)
                ->where($where3)
                ->where($where4)
                ->where($where5)
                ->get();

        return $q->num_rows();
    }

    public function filterResultForTwoQuery_pagination($limit, $offset, $where1, $where2, $where3, $where4, $where5)
    {
        $this->db->select("*");
        $this->db->from("events");
        $this->db->where($where1);
        $this->db->where($where2);
        $this->db->where($where3);
        $this->db->where($where4);
        $this->db->where($where5);
        $this->db->order_by("startDate", "desc");
        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }

    public function count_filterResultForThreeQuery($where1, $where2, $where3, $where4, $where5, $where6)
    {
        $q = $this->db->from("events")
                ->where($where1)
                ->where($where2)
                ->where($where3)
                ->where($where4)
                ->where($where5)
                ->where($where6)
                ->get();

        return $q->num_rows();
    }

    public function filterResultForThreeQuery_pagination($limit, $offset, $where1, $where2, $where3, $where4, $where5, $where6)
    {
        $this->db->select("*");
        $this->db->from("events");
        $this->db->where($where1);
        $this->db->where($where2);
        $this->db->where($where3);
        $this->db->where($where4);
        $this->db->where($where5);
        $this->db->where($where6);
        $this->db->order_by("startDate", "desc");
        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }

    public function count_filterResultForFourQuery($where1, $where2, $where3, $where4, $where5, $where6, $where7)
    {
        $q = $this->db->from("events")
                ->where($where1)
                ->where($where2)
                ->where($where3)
                ->where($where4)
                ->where($where5)
                ->where($where6)
                ->where($where7)
                ->get();

        return $q->num_rows();
    }

    public function count_filterResultForFiveQuery($where1, $where2, $where3, $where4, $where5, $where6, $where7, $where8)
    {
        $q = $this->db->from("events")
                ->where($where1)
                ->where($where2)
                ->where($where3)
                ->where($where4)
                ->where($where5)
                ->where($where6)
                ->where($where7)
                ->where($where8)
                ->get();

        return $q->num_rows();
    }

    public function filterResultForFiveQuery_pagination($limit, $offset, $where1, $where2, $where3, $where4, $where5, $where6, $where7, $where8)
    {
        $this->db->select("*");
        $this->db->from("events");
        $this->db->where($where1);
        $this->db->where($where2);
        $this->db->where($where3);
        $this->db->where($where4);
        $this->db->where($where5);
        $this->db->where($where6);
        $this->db->where($where7);
        $this->db->where($where8);
        $this->db->order_by("startDate", "desc");
        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }

    public function DeleteData($table, $where)
    {
        if ($this->db->delete($table, $where))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function view_data($table, $field, $where)
    {
        if ($where)
        {
            $this->db->where($where);
        }
        $this->db->select($field);
        $this->db->from($table);
        $this->db->order_by("id", "desc");
        return $this->db->get()->result();
    }

    public function view_data_home($table, $field, $where)
    {
        if ($where)
        {
            $this->db->where($where);
        }
        $this->db->select($field);
        $this->db->from($table);
        $this->db->order_by("startDate", "desc");
        return $this->db->get()->result();
    }

    public function view_data_2where($table, $field, $where1, $where2)
    {
        if ($where1 && $where2)
        {
            $this->db->where($where1);
            $this->db->where($where2);
        }
        $this->db->select($field);
        $this->db->from($table);
        $this->db->order_by("id", "desc");
        return $this->db->get()->result();
    }

    public function view_data_with_2wheres($table, $field, $where1, $where2)
    {
        if ($where1 && $where2)
        {
            $this->db->where($where1);
            $this->db->where($where2);
        }
        $this->db->select($field);
        $this->db->from($table);
        $this->db->order_by("id", "desc");
        return $this->db->get()->result();
    }

    public function view_data_with_3wheres($table, $field, $where1, $where2, $where3)
    {
        if ($where1 && $where2 && $where3)
        {
            $this->db->where($where1);
            $this->db->where($where2);
            $this->db->where($where3);
        }
        $this->db->select($field);
        $this->db->from($table);
        $this->db->order_by("id", "desc");
        return $this->db->get()->result();
    }

    public function view_data_with_4wheres($table, $field, $where1, $where2, $where3, $where4)
    {
        if ($where1 && $where2 && $where3 && $where4)
        {
            $this->db->where($where1);
            $this->db->where($where2);
            $this->db->where($where3);
            $this->db->where($where4);
        }
        $this->db->select($field);
        $this->db->from($table);
        $this->db->order_by("id", "desc");
        return $this->db->get()->result();
    }

    public function unsubscribe_data($table, $field, $where1, $where2)
    {
        if ($where1 && $where2)
        {
            $this->db->where("userid", $where1);
            $this->db->where("eventid", $where2);
        }
        $this->db->select($field);
        $this->db->from($table);
        return $this->db->get()->result();
    }

    public function view_data_subscribers($table, $field, $where1, $where2)
    {
        if ($where1 && $where2)
        {
            $this->db->where($where1);
            $this->db->where($where2);
        }
        $this->db->select($field);
        $this->db->from($table);
        $this->db->order_by("subscribers.id", "desc");
        $this->db->group_by("subscribers.id");
        return $this->db->get()->result();
    }

    public function UpdateData($table, $data, $where)
    {
        $this->db->where($where);
        if ($this->db->update($table, $data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function view_with_asc($table, $field, $order)
    {
        $this->db->select($field);
        $this->db->from($table);
        $this->db->order_by($order, "asc");
        return $this->db->get()->result();
    }

    public function all_event_pagination($limit, $offset, $where1, $where2)
    {
        $this->db->select("*");
        $this->db->from("events");
        $this->db->where($where1);
        $this->db->where($where2);
        $this->db->order_by("activeorinactive", "asc");
        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }

    public function all_user_pagination($limit, $offset)
    {
        $this->db->select("*");
        $this->db->from("users");
        $this->db->order_by("activeorinactive", "asc");
        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }

    public function all_businessAcc_pagination($limit, $offset)
    {
        $this->db->select("*");
        $this->db->from("business");
        $this->db->order_by("activeorinactive", "asc");
        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }

    public function view_with_desc($table, $field, $order)
    {
        $this->db->select($field);
        $this->db->from($table);
        $this->db->order_by($order, "desc");
        return $this->db->get()->result();
    }

    public function GetMultipleQueryResult($queryString)
    {
        if (empty($queryString))
        {
            return false;
        }
        $index = 0;
        $ResultSet = array();
        if (mysqli_multi_query($this->db->conn_id, $queryString))
        {
            do
            {
                if (false != $result = mysqli_store_result($this->db->conn_id))
                {
                    $rowID = 0;
                    while ($row = $result->fetch_object())
                    {
                        $ResultSet[$index][$rowID] = $row;
                        $rowID++;
                    }
                }
                $index++;
            }
            while (mysqli_next_result($this->db->conn_id) && mysqli_more_results($this->db->conn_id));
        }
        return $ResultSet;
    }

}
