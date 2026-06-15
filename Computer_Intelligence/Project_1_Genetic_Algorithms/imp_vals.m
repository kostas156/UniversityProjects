function [sOfItems, vOfItems, solSize,weighTarget, maxItems] = imp_vals(filename1)
    if nargin<1
        filename1 = 'knapsack.xls';
    end
    %opts = detectImportOptions('knapsack.xls', 'DataRange', 'A3:C102');

    sOfItems = xlsread('knapsack.xls','B:B');
    vOfItems = xlsread('knapsack.xls','C:C');
    weighTarget = readmatrix(filename1, 'Range', 'A1:A1');
    solSize = readmatrix(filename1, 'Range', 'A2:A2');
    
    sortedSize = sort(sOfItems);
    maxItems = 0;
    temp = 0;
    i = 1;
    
    while temp<weighTarget
        if (temp+sortedSize(i))<weighTarget
            maxItems = maxItems + 1;
        end
        temp = temp + sortedSize(i);
        i = i + 1;
    end
end