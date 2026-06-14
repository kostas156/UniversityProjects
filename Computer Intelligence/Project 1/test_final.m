function [best_sol_of_round, T]=test_final()
    best_sol_of_round = nan(50, 1);
    T = zeros(50, 1);
    for i=1:50
        tic
        best_sol_of_round(i) = fit_co(solveKnapsack());
        T(i) = toc;
        disp(i)
        disp(T(i))
    end
end