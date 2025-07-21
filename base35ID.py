ID_DIC = {1: "1", 2: "2", 3: "3", 4: "4", 5: "5", 6: "6", 7: "7", 8: "8", 9: "9", 10: "A", 11: "B", 12: "C", 13: "D", 
          14: "E", 15: "F", 16: "G", 17: "H", 18: "I", 19: "J", 20: "K", 21: "L", 22: "M", 23: "N", 24: "O", 25: "P", 
          26: "Q", 27: "R", 28: "S", 29: "T", 30: "U", 31: "V", 32: "W", 33: "X", 34: "Y", 35: "Z"}
MAX_BASE = 35

def generate_id(num):
    """
    >>> generate_id(10), generate_id(35), generate_id(36), generate_id(70), generate_id(1260)
    ('A', 'Z', '11', '1Z', 'ZZ')
    >>>
    >>> generate_id(39), generate_id(1000000), generate_id(17856123)
    ('14', 'NBBF', 'BVGEX')
    >>>
    :param num:
    :return:
    """
    gen_id = ""
    while num > MAX_BASE:
        remainder = num % MAX_BASE
        num = num // MAX_BASE
        if remainder == 0:
            remainder = MAX_BASE
            num -= 1
        gen_id += ID_DIC[remainder]
    gen_id += ID_DIC[num]
    return gen_id[::-1]

def translate_id(id_str):
    """
        >>> translate_id('A'), translate_id('Z'), translate_id('11'), translate_id('1Z'), translate_id('ZZ')
        (10, 35, 36, 70, 1260)
        >>>
        >>> translate_id('14'), translate_id('NBBF'), translate_id('BVGEX')
        (39, 1000000, 17856123)
        >>>
        :param id_str:
        :return:
        """
    backwards_dic = {v: k for k, v in ID_DIC.items()}
    str_len = len(id_str)
    gen_id = 0
    for i in range(str_len):
        cur_char = id_str[str_len - i - 1:str_len - i]
        gen_id += (backwards_dic[cur_char] * pow(MAX_BASE, i))
    return gen_id
