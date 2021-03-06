<?php  /*捷讯设计*/
/**
 * ALIPAY API: alipay.ebpp.pdeduct.pay request
 *
 * @author auto create
 * @since 1.0, 2015-01-21 16:51:29
 */
class AlipayEbppPdeductPayRequest
{
	/** 
	 * 分配给外部机构发起扣款时的渠道码。朗新为LANGXIN
	 **/
	private $agentChannel;
	
	/** 
	 * 二级渠道码，预留字段
	 **/
	private $agentCode;
	
	/** 
	 * 支付宝代扣协议Id
	 **/
	private $agreementId;
	
	/** 
	 * 账期
	 **/
	private $billDate;
	
	/** 
	 * 户号
	 **/
	private $billKey;
	
	/** 
	 * 扩展参数。必须以key value形式定义，
转为json为格式：{"key1":"value1","key2":"value2",
"key3":"value3","key4":"value4"}
 后端会直接转换为MAP对象，转换异常会报参数格式错误
	 **/
	private $extendField;
	
	/** 
	 * 滞纳金
	 **/
	private $fineAmount;
	
	/** 
	 * 备注信息
	 **/
	private $memo;
	
	/** 
	 * 商户外部业务流水号
	 **/
	private $outOrderNo;
	
	/** 
	 * 扣款金额，支付总金额，包含滞纳金
	 **/
	private $payAmount;
	
	/** 
	 * 商户PartnerId
	 **/
	private $pid;
	
	/** 
	 * 通过服务窗拿到的openId
	 **/
	private $userId;

	private $apiParas = array();
	private $terminalType;
	private $terminalInfo;
	private $prodCode;
	private $apiVersion="1.0";
	
	public function setAgentChannel($agentChannel)
	{
		$this->agentChannel = $agentChannel;
		$this->apiParas["agent_channel"] = $agentChannel;
	}

	public function getAgentChannel()
	{
		return $this->agentChannel;
	}

	public function setAgentCode($agentCode)
	{
		$this->agentCode = $agentCode;
		$this->apiParas["agent_code"] = $agentCode;
	}

	public function getAgentCode()
	{
		return $this->agentCode;
	}

	public function setAgreementId($agreementId)
	{
		$this->agreementId = $agreementId;
		$this->apiParas["agreement_id"] = $agreementId;
	}

	public function getAgreementId()
	{
		return $this->agreementId;
	}

	public function setBillDate($billDate)
	{
		$this->billDate = $billDate;
		$this->apiParas["bill_date"] = $billDate;
	}

	public function getBillDate()
	{
		return $this->billDate;
	}

	public function setBillKey($billKey)
	{
		$this->billKey = $billKey;
		$this->apiParas["bill_key"] = $billKey;
	}

	public function getBillKey()
	{
		return $this->billKey;
	}

	public function setExtendField($extendField)
	{
		$this->extendField = $extendField;
		$this->apiParas["extend_field"] = $extendField;
	}

	public function getExtendField()
	{
		return $this->extendField;
	}

	public function setFineAmount($fineAmount)
	{
		$this->fineAmount = $fineAmount;
		$this->apiParas["fine_amount"] = $fineAmount;
	}

	public function getFineAmount()
	{
		return $this->fineAmount;
	}

	public function setMemo($memo)
	{
		$this->memo = $memo;
		$this->apiParas["memo"] = $memo;
	}

	public function getMemo()
	{
		return $this->memo;
	}

	public function setOutOrderNo($outOrderNo)
	{
		$this->outOrderNo = $outOrderNo;
		$this->apiParas["out_order_no"] = $outOrderNo;
	}

	public function getOutOrderNo()
	{
		return $this->outOrderNo;
	}

	public function setPayAmount($payAmount)
	{
		$this->payAmount = $payAmount;
		$this->apiParas["pay_amount"] = $payAmount;
	}

	public function getPayAmount()
	{
		return $this->payAmount;
	}

	public function setPid($pid)
	{
		$this->pid = $pid;
		$this->apiParas["pid"] = $pid;
	}

	public function getPid()
	{
		return $this->pid;
	}

	public function setUserId($userId)
	{
		$this->userId = $userId;
		$this->apiParas["user_id"] = $userId;
	}

	public function getUserId()
	{
		return $this->userId;
	}

	public function getApiMethodName()
	{
		return "alipay.ebpp.pdeduct.pay";
	}

	public function getApiParas()
	{
		return $this->apiParas;
	}

	public function getTerminalType()
	{
		return $this->terminalType;
	}

	public function setTerminalType($terminalType)
	{
		$this->terminalType = $terminalType;
	}

	public function getTerminalInfo()
	{
		return $this->terminalInfo;
	}

	public function setTerminalInfo($terminalInfo)
	{
		$this->terminalInfo = $terminalInfo;
	}

	public function getProdCode()
	{
		return $this->prodCode;
	}

	public function setProdCode($prodCode)
	{
		$this->prodCode = $prodCode;
	}

	public function setApiVersion($apiVersion)
	{
		$this->apiVersion=$apiVersion;
	}

	public function getApiVersion()
	{
		return $this->apiVersion;
	}

}
