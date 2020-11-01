# file_finder.py
import os
#https://blog.csdn.net/Likianta/article/details/89371060?utm_medium=distribute.wap_relevant.none-task-blog-BlogCommendFromMachineLearnPai2-1.wap_blog_relevant_pic&depth_1-utm_source=distribute.wap_relevant.none-task-blog-BlogCommendFromMachineLearnPai2-1.wap_blog_relevant_pic

def findall_files(main_dir: str) -> list:
    collector = []
    
    for root, dirs, files in os.walk(main_dir):
        collector.extend([os.path.join(root, f) for f in files])
    
    return collector


def findall_subdirs(main_dir: str) -> list:
    collector = []
    
    for root, dirs, files in os.walk(main_dir):
        collector.extend(os.path.join(root, d) for d in dirs)
    
    return collector
files=findall_files('./')
print(files)

