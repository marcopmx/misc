import random
import tkinter as tk


def start_window():
    window = tk.Tk()
    window.title("Random Nums")
    window.geometry("910x775")
    window.configure(background='white')
    label = tk.Label(window, text="he", background="white", foreground="black", font=('', 500))
    label.place(relx=.5, rely=.5, anchor=tk.CENTER)
    return window, label


def run_window(window, label, nums):
    label.configure(text=nums[0])
    print(nums[0], 1)
    next_button = tk.Button(text="Next", command=lambda: update_text(nums, label, 1, next_button), font="Helvetica 35"
                            )
    next_button.place(x=425, y=630)
    window.mainloop()
    window.quit()


def update_text(nums, label, index, button):
    cur_num = nums[index]
    label.configure(text=cur_num)
    label.update_idletasks()
    print(cur_num, index + 1)
    if index == 99:
        button.config(text="All Done!", state="disabled")
    else:
        button.config(text="Next", command=lambda: update_text(nums, label, index + 1, button))


def main():
    pop = list(range(1, 101))
    random.shuffle(pop)
    root, label = start_window()
    run_window(root, label, pop)

if __name__ == '__main__':
    main()
