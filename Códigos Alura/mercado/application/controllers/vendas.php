<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Vendas extends CI_Controller {
    public function nova() {        
        $usuario = autoriza();
        $usuario = $this->session->userdata("usuario_logado");
        $this->load->helper("date");
        $this->load->model(array("vendas_model", "produtos_model", "usuarios_model"));
        $venda = array(
            "produto_id"=> $this->input->post("produto_id"),
            "comprador_id" => $usuario["id"],
            "data_de_entrega" => dataPtBrParaMysql($this->input->post("data_de_entrega"))                                 
        );                                    
            $this->vendas_model->salva($venda);
            $this->load->library("email");
            $config["protocol"] = "smtp";
            $config["smtp_host"] =  "ssl://smtp.gmail.com";
            $config["smtp_user"] = "rigelforneris@gmail.com";
            $config["smtp_pass"] = "newshitnewshit";
            $config["charset"] = "utf8";
            $config["mailtype"] = "html";
            $config["newline"] = "\r\n";
            $config["smtp_port"] = '465';
            
            $this->email->initialize($config);            

            
            $produto = $this->produtos_model->busca($venda["produto_id"]);
            $vendedor = $this->usuarios_model->busca($produto["usuario_id"]);
            
            $dados = array("produto" => $produto);
            $conteudo = $this->load->view("vendas/email.php", $dados, TRUE);
            
            $this->email->from("rigelforneris@gmail.com", "Mercado");
            $this->email->to($vendedor["email"]);
            $this->email->subject("Seu produto {$produto['nome']} foi vendido!");
            $this->email->message($conteudo);
            
            $this->email->send();
            
            
            $this->session->set_flashdata("success", "Pedido de compra efetuado com sucesso");
            redirect("/");
    }
    
    public function index(){       
        $usuario = $usuario = autoriza();
        $this->load->model("produtos_model");
        $this->load->helper("date");
        $produtosVendidos = $this->produtos_model->buscaVendidos($usuario);
        $dados = array("produtosVendidos" => $produtosVendidos);
        $this->load->template("vendas/index", $dados);
    }
    
}
