#!/usr/bin/python
# -*- coding: UTF-8 -*-
"""
http://club.excelhome.net/forum.php?mod=viewthread&tid=1560839&mobile=2
https://blog.csdn.net/u013925378/article/details/102742487?utm_medium=distribute.wap_relevant.none-task-blog-BlogCommendFromMachineLearnPai2-4.wap_blog_relevant_pic&depth_1-utm_source=distribute.wap_relevant.none-task-blog-BlogCommendFromMachineLearnPai2-4.wap_blog_relevant_pic

python获取某文件夹下所有指定后缀的文件
import json

f=open("o.txt")
#打开json文件
result4=json.load(f)
print(result4["infos"][0]["id"])
print(result4["pagination"]["totalRecords"])
"""

import os
import json
path = ".//json"
result =[]
datanames = os.listdir(path)
for dataname in datanames:
    if os.path.splitext(dataname)[1] == '.json':#目录下包含.json的文件
        result.append(dataname)
rows=[]
for file in result:
    print(os.path.join(path,file))
    row=[]
    filepath=os.path.join(path,file)
    #f=open(path+"/"+dataname)
    f=open(filepath)
    result4=json.load(f)
    #print(result4)
    f.close()
    len_of_prog=len(result4["programs"])
    '''
    print(len_of_prog)
    
    import sys
    sys.exit()
    '''
    for t in range(len_of_prog):
        cell=result4["seriesId"]
        #print(cell)
        

        row.append(cell)
        #print(row)

        cell=result4["seriesName"]
        #print(cell)
        

        row.append(cell)
        #print(row)
        cell=result4["programs"][t]["movies"][0]["playURL"]
        ##print(cell)
        

        row.append(cell)
        #print(row)
        rows.append(row)
        #print(rows)

 
    #break

'''
import shutil
filename="json.xlsx"
source=os.path.join(path,filename)
filename="json.xlsx.bsk"
target=os.path.join(path,filename)
shutil.copy(source,target)
import sys
sys.exit()
'''
#将rows写入excel
import openpyxl as op

def op_toexcel(data,filename): # openpyxl库储存数据到excel

    #wb = op.Workbook(filename) # 创建工作簿对象
    #https://openpyxl.readthedocs.io/en/stable/usage.html#read-an-existing-workbook
    wb=op.load_workbook(filename)
    ws = wb['Sheet1'] # 创建子表
    for i in range(len(data)):
        d = data[i]
        print(d)
        ws.append(d) # 每次写入一行
    wb.save(filename)
    print(ws.values)
    range_date=ws.values
    l=[[cell for cell in row] for row in range_date][1:]
    print(l)
data=rows
filename=os.path.join("json","json.xlsx")
op_toexcel(data,filename)

