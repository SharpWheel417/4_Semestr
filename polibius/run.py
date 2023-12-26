from tkinter import *
from tkinter import messagebox
 

polybius=[
  ["а","б","в","г","д","е","ё","ж","з"],
  ["и","й","к","л","м","н","о","п","р"],
  ["с","т","у","ф","х","ц","ч","ш","щ"],
  ["ъ","ы","ь","э","ю","я","А","Б","В"],
  ["Г","Д","Е","Ё","Ж","З","И","Й","К"],
  ["Л","М","Н","О","П","Р","С","Т","У"],
  ["Ф","Х","Ц","Ч","Ш","Щ","Ъ","Ы","Ь"],
  ["Э","Ю","Я"," ",".",":","!","?",","]
  ]
  

def incryption():
  
    message = str(message_en.get())
    # m = int(height_tf.get())/100
    # bmi = kg/(m*m)
    # bmi = round(bmi, 1)

    incrypted_mes=''
    for ltr in range(len(message)):
        for i in range(8):
            for j in range(9):
                if message[ltr]==polybius[i][j]:
                    incrypted_mes+=str(i)+str(j)+' '
    
    ##Вывод зашифрованного сообщения            
    height = Label(
    frame,
    text="Зашифрованное сообщение:"+incrypted_mes)
    height.grid(row=5, column=1)

    shifr_lb = Label(
    frame,
    text="Введите Зашифрованное сообщение ",
    )
    shifr_lb.grid(row=4, column=1)

    shifr_en.setvar(str(incrypted_mes))

    print(incrypted_mes)

##Расшифровывает сообщение
def decryption():
  
    message = str(shifr_en.get())
    decrypted_mes = ''
  
    for num in range(0,len(message),2):
        for i in range(8):
            for j in range(9):
                if message[num] == str(i) and message[num+1] == str(j):
                    decrypted_mes+=str(polybius[i][j])

    height = Label(
    frame,
    text="Расшифрованное сообщение:"+decrypted_mes)
    height.grid(row=10, column=1)
 
    print(decrypted_mes)



window = Tk()
window.title('Шифровщик сообщений ПОлибушка')
window.geometry('400x300')
 
 
frame = Frame(
   window,
   padx=10,
   pady=10
)
frame.pack(expand=True)
 
 
mess_lb = Label(
   frame,
   text="Введите сообщение"
)
mess_lb.grid(row=3, column=1)
 
 
message_en = Entry(
   frame,
)
message_en.grid(row=3, column=2, pady=5)

shifr_en = Entry(
    frame,
    )
shifr_en.grid(row=4, column=2, pady=5)

cal_btn = Button(
   frame,
   text='Зашифровать сообщение',
   command=incryption
)
cal_btn.grid(row=5, column=2)




cal_btn = Button(
   frame,
   text='Расшифровать сообщение сообщение',
   command=decryption
)
cal_btn.grid(row=7, column=2)
 
window.mainloop()